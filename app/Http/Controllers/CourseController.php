<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Department;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Request $request){
    $courses = Course::all();
    $courses = Course::with('department')->paginate(5);
    // Return the blade view and pass the data
    return view('courses.coursePage',compact('courses'));
    }

    public function create(Request $request){
        $departments = Department::all();
        return view('courses.create',compact('departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'department_id'       => 'required|exists:departments,id',
            'course_code'         => 'required|string',
            'course_name'         => 'required|string',
            'description'         => 'nullable|string',
            'lecture_hours'       => 'required|numeric|min:0',
            'tutorial_hours'      => 'required|numeric|min:0',
            'practical_hours'     => 'required|numeric|min:0',
            'is_elective'         => 'nullable|boolean',
            'required_choices'    => 'nullable|integer|min:1',
            'elective_pool_size'  => 'nullable|integer|min:1',
            'course_category'     => 'required|in:normal,MPU',
        ]);

        $validatedData['is_elective'] = $request->has('is_elective');
        $validatedData['is_active'] = 1;
        Course::create($validatedData);
        return redirect('/courses')->with('success', 'Course added successfully!');
    }
}
