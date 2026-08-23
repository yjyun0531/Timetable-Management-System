<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Department;

class LecturerController extends Controller
{
    public function show(Request $request){
        $lecturers = Lecturer::with('department')->paginate(10);
        return view('lecturers.lecturerPage', compact('lecturers'));
    }

    public function create(Request $request){
        $departments = Department::all();
        return view('lecturers.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        Lecturer::create($validatedData);
        return redirect('/lecturers')->with('success', 'Lecturer added successfully!');
    }

    public function editForm($id){
        $lecturer = Lecturer::findOrFail($id);
        $departments = Department::all();
        return view('lecturers.edit', compact('lecturer', 'departments'));
    }

    public function update(Request $request, $id){
        $lecturer = Lecturer::findOrFail($id);
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);
        $lecturer->update($validatedData);
        return redirect('/lecturers')->with('success', 'Lecturer updated successfully!');
    }

    public function deleteForm($id){
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturers.delete', compact('lecturer'));
    }

    public function destroy($id){
        $lecturer = Lecturer::findOrFail($id);
        $lecturer->delete();
        return redirect('/lecturers')->with('success', 'Lecturer deleted successfully!');
    }
}
