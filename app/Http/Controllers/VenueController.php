<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;

class VenueController extends Controller
{
    public function show(Request $request){
        $venues = Venue::all();
        return view('venues.venuePage', compact('venues'));
    }

    public function create(Request $request){
        return view('venues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'capacity' => 'required|numeric',
            'type' => 'required|in:L,T,B,P',
        ]);

        Venue::create($request->all());

        return redirect('/venues')->with('success', 'New Venue created successfully.');
    }

    public function editForm($id){
        $venue = Venue::findOrFail($id);
        return view('venues.edit', compact('venue'));
    }

    public function update(Request $request, $id){
        $venue = Venue::findOrFail($id);
        $request->validate([
            'name'     => 'required|max:255',
            'capacity' => 'required|numeric',
            'type'     => 'required|in:L,T,B,P',
        ]);
        $venue->update($request->all());
        return redirect('/venues')->with('success', 'Venue updated successfully.');
    }

    public function deleteForm($id){
        $venue = Venue::findOrFail($id);
        return view('venues.delete', compact('venue'));
    }

    public function destroy($id){
        $venue = Venue::findOrFail($id);
        $venue->delete();
        return redirect('/venues')->with('success', 'Venue deleted successfully.');
    }
}