<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function show(Request $request){
    // Fetch all departments from the database
    $departments = Department::all();
    
    // Return the blade view and pass the data
    return view('departments.departmentPage',compact('departments'));
    }

    public function create(Request $request){
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:departments,code|max:10',
            'name' => 'required|max:255',
        ]);

        Department::create($request->all());

        return redirect('/departments')->with('success', 'Department created successfully.');
    }

    public function editForm($id){
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id){
        $department = Department::findOrFail($id);
        $request->validate([
            'code' => 'required|max:10|unique:departments,code,' . $id,
            'name' => 'required|max:255',
        ]);
        $department->update($request->all());
        return redirect('/departments')->with('success', 'Department updated successfully.');
    }

    public function deleteForm($id){
        $department = Department::findOrFail($id);
        return view('departments.delete', compact('department'));
    }

    public function destroy($id){
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect('/departments')->with('success', 'Department deleted successfully.');
    }
}
