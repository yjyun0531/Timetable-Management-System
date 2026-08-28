<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Models\CourseOffering;
use App\Models\Lecturer;
use App\Models\Venue;

class TimetableController extends Controller
{
    public function show(Request $request){
        $entries = Timetable::with(['offering.course', 'lecturer', 'venue'])->paginate(10);
        return view('timetable.timetablePage', compact('entries'));
    }


    private function rules(){
        return [
            'offering_id'  => 'required|exists:course_offerings,id',
            'lecturer_id'  => 'required|exists:lecturers,id',
            'venue_id'     => 'required|exists:venues,id',
            'trimester'    => 'required|string',
            'day_of_week'  => 'required|string',
            'start_time'   => 'required',
            'end_time'     => 'required|after:start_time',
            'class_type'   => 'required|in:L,T,P',
            'class_group'  => 'nullable|string|max:20',
            'week_type'    => 'required|in:every,odd,even',
            'is_locked'    => 'nullable|boolean',
        ];
    }

    private function hasConflict($lecturer_id, $venue_id, $day, $start, $end, $excludeId = null){
        $query = Timetable::where('day_of_week', $day)
            ->where(function($q) use ($start, $end) {
                $q->where('start_time', '<', $end)
                  ->where('end_time', '>', $start);
            })
            ->where(function($q) use ($lecturer_id, $venue_id) {
                $q->where('lecturer_id', $lecturer_id)
                  ->orWhere('venue_id', $venue_id);
            });

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->first();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules());
        $validatedData['is_locked'] = $request->has('is_locked');
        $validatedData['status'] = 'confirmed';

        $conflict = $this->hasConflict(
            $validatedData['lecturer_id'], $validatedData['venue_id'],
            $validatedData['day_of_week'], $validatedData['start_time'], $validatedData['end_time']
        );

        if ($conflict) {
            $reason = $conflict->lecturer_id == $validatedData['lecturer_id']
                ? 'The lecturer already has a' . ($conflict->is_locked ? ' locked Practical' : 'n existing ' . $conflict->class_type) . ' session at this time.'
                : 'The venue is already booked at this time.';
            return redirect()->back()->withInput()->with('error', 'Scheduling conflict: ' . $reason);
        }

        Timetable::create($validatedData);
        return redirect('/timetable/grid?day=' . $request->day_of_week)->with('success', 'Timetable entry added successfully!');
    }

    public function editForm($id){
        $entry = Timetable::findOrFail($id);
        $offerings = CourseOffering::with('course')->get();
        $lecturers = Lecturer::all();
        $venues = Venue::all();
        return view('timetable.edit', compact('entry', 'offerings', 'lecturers', 'venues'));
    }

    public function update(Request $request, $id){
        $entry = Timetable::findOrFail($id);
        $validatedData = $request->validate($this->rules());
        $validatedData['is_locked'] = $request->has('is_locked');

        $conflict = $this->hasConflict(
            $validatedData['lecturer_id'], $validatedData['venue_id'],
            $validatedData['day_of_week'], $validatedData['start_time'], $validatedData['end_time'],
            $id
        );

        if ($conflict) {
            return redirect()->back()->withInput()->with('error', 'Scheduling conflict: this lecturer or venue is already booked at this time.');
        }

        $entry->update($validatedData);
        return redirect('/timetable')->with('success', 'Timetable entry updated successfully!');
    }

    public function deleteForm($id){
        $entry = Timetable::with(['offering.course', 'lecturer', 'venue'])->findOrFail($id);
        return view('timetable.delete', compact('entry'));
    }

    public function destroy($id){
        $entry = Timetable::findOrFail($id);
        $entry->delete();
        return redirect('/timetable')->with('success', 'Timetable entry deleted successfully!');
    }

    public function grid(Request $request){
        $day = $request->query('day', 'Monday');
        $venues = Venue::orderBy('name')->get();

        $slots = [
            ['08:00','09:00','8-9'],
            ['09:00','10:00','9-10'],
            ['10:00','11:00','10-11'],
            ['11:00','12:00','11-12'],
            ['12:00','13:00','12-1'],
            ['13:00','14:00','1-2'],
            ['14:00','15:00','2-3'],
            ['15:00','16:00','3-4'],
            ['16:00','17:00','4-5'],
            ['17:00','18:00','5-6'],
        ];

        $entries = Timetable::with(['offering.course', 'lecturer'])
            ->where('day_of_week', $day)
            ->get();

        $rows = [];
        foreach ($venues as $venue) {
            $venueEntries = $entries->where('venue_id', $venue->id);
            $cells = [];
            $skipUntil = -1;

            foreach ($slots as $i => $slot) {
                if ($i <= $skipUntil) continue;
                [$slotStart, $slotEnd, $label] = $slot;

                $entry = $venueEntries->first(function($e) use ($slotStart) {
                    return substr($e->start_time, 0, 5) === $slotStart;
                });

                if ($entry) {
                    $startH = (int) substr($entry->start_time, 0, 2);
                    $endH = (int) substr($entry->end_time, 0, 2);
                    $duration = max(1, $endH - $startH);
                    $colspan = min($duration, count($slots) - $i);
                    $cells[] = ['type' => 'entry', 'entry' => $entry, 'colspan' => $colspan];
                    $skipUntil = $i + $colspan - 1;
                } else {
                    $cells[] = ['type' => 'empty'];
                }
            }
            $rows[] = ['venue' => $venue, 'cells' => $cells];
        }

        $offerings = CourseOffering::with(['course', 'lecturerCourses.lecturer'])->get();
        $lecturers = Lecturer::all();

        return view('timetable.grid', compact('rows', 'slots', 'day', 'venues', 'offerings', 'lecturers'));
    }

    
}