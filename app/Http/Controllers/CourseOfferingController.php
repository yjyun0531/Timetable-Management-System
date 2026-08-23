<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseOffering;
use App\Models\Course;

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

    public function editForm($id){
        $offering = CourseOffering::findOrFail($id);
        $courses = Course::all();
        return view('courseOfferings.edit', compact('offering', 'courses'));
    }

    public function update(Request $request, $id){
        $offering = CourseOffering::findOrFail($id);
        $validatedData = $request->validate([
            'course_id'            => 'required|exists:courses,id',
            'batch_code'           => 'required|string',
            'trimester'            => 'required|string',
            'num_students'         => 'required|integer|min:0',
            'is_shared_programme'  => 'nullable|boolean',
        ]);
        $validatedData['is_shared_programme'] = $request->has('is_shared_programme');
        $offering->update($validatedData);
        return redirect('/course-offerings')->with('success', 'Course offering updated successfully!');
    }

    public function deleteForm($id){
        $offering = CourseOffering::with('course')->findOrFail($id);
        return view('courseOfferings.delete', compact('offering'));
    }

    public function destroy($id){
        $offering = CourseOffering::findOrFail($id);
        $offering->delete();
        return redirect('/course-offerings')->with('success', 'Course offering deleted successfully!');
    }
}
