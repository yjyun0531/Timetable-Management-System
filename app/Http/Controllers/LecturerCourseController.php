<?php

namespace App\Http\Controllers;

use App\Models\LecturerCourse;
use App\Models\Lecturer;
use App\Models\CourseOffering;
use Illuminate\Http\Request;

class LecturerCourseController extends Controller
{
    public function show(Request $request){
        $assignments = LecturerCourse::with(['lecturer', 'offering.course'])->get();
        return view('lecturerCourses.assignmentPage', compact('assignments'));
    }

    public function create(Request $request){
        $lecturers = Lecturer::all();
        $offerings = CourseOffering::with('course')->get();
        return view('lecturerCourses.create', compact('lecturers', 'offerings'));
    }

    private function rules(){
        return [
            'lecturer_id' => 'required|exists:lecturers,id',
            'offering_id' => 'required|exists:course_offerings,id',
            'class_group' => 'nullable|string|max:20',
        ];
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules());
        LecturerCourse::create($validatedData);
        return redirect('/lecturer-courses')->with('success', 'Lecturer assigned successfully!');
    }

    public function editForm($lecturer_id, $offering_id){
        $assignment = LecturerCourse::where('lecturer_id', $lecturer_id)
            ->where('offering_id', $offering_id)->firstOrFail();
        $lecturers = Lecturer::all();
        $offerings = CourseOffering::with('course')->get();
        return view('lecturerCourses.edit', compact('assignment', 'lecturers', 'offerings'));
    }

    public function update(Request $request, $lecturer_id, $offering_id){
        $assignment = LecturerCourse::where('lecturer_id', $lecturer_id)
            ->where('offering_id', $offering_id)->firstOrFail();
        $validatedData = $request->validate($this->rules());
        $assignment->update($validatedData);
        return redirect('/lecturer-courses')->with('success', 'Assignment updated successfully!');
    }

    public function deleteForm($lecturer_id, $offering_id){
        $assignment = LecturerCourse::with(['lecturer', 'offering.course'])
            ->where('lecturer_id', $lecturer_id)
            ->where('offering_id', $offering_id)->firstOrFail();
        return view('lecturerCourses.delete', compact('assignment'));
    }

    public function destroy($lecturer_id, $offering_id){
        LecturerCourse::where('lecturer_id', $lecturer_id)
            ->where('offering_id', $offering_id)->delete();
        return redirect('/lecturer-courses')->with('success', 'Assignment removed successfully!');
    }
}