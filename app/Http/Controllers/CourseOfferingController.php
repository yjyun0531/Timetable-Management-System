<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseOfferingController extends Controller
{
    public function show(Request $request){
        $offerings = CourseOffering::with('course')->paginate(10);
        return view('courseOfferings.offeringPage', compact('offerings'));
    }

    public function create(Request $request){
        $courses = Course::all();
        return view('courseOfferings.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_id'            => 'required|exists:courses,id',
            'batch_code'           => 'required|string',
            'trimester'            => 'required|string',
            'num_students'         => 'required|integer|min:0',
            'is_shared_programme'  => 'nullable|boolean',
        ]);
        $validatedData['is_shared_programme'] = $request->has('is_shared_programme');
        CourseOffering::create($validatedData);
        return redirect('/course-offerings')->with('success', 'Course offering added successfully!');
    }
}
