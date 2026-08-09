<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;

class VenueController extends Controller
{
    public function show(Request $request){
    // Fetch all venue from the database
    $venues = Venue::all();
    
    // Return the blade view and pass the data
    return view('venues.venuePage',compact('venues'));
    }

    public function create(Request $request){
        return view('venues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'capacity' => 'required|numeric',
            'type' => 'required|in:L,T,B',
        ]);

        Venue::create($request->all());

        return redirect('/venues')->with('success', 'New Venue created successfully.');
    }
}
