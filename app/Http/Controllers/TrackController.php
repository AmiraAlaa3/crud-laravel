<?php

namespace App\Http\Controllers;
use App\Models\tracks;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    function index()
    {
        $tarcks=tracks::all();
        return view('Tracks.tracksData',compact("tarcks"));
    }

    function show($id)
    {
        $track=tracks::findOrFail($id);
        return view('Tracks.trackData',compact("track"));
    }
    function destroy($id)
    {
        $track = tracks::findOrFail($id);
        if ($track->logo) {
            $imagePath = public_path('uploads') . '/' . $track->logo;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $track->delete();
        return to_route(tracks.index);
    }
    function create()
    {
        return view('Tracks.createTrack');
    }

    public function store(Request $request)
    {   
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'student_numbers' => 'required|integer',
            'branch_name' => 'required|string|max:255',
            'track_type' => 'required|string|max:255',
            'track_status' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image:jpeg,png,jpg,gif', 
        ]);

        $fileName = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('uploads'), $fileName);
        }

        $track = new tracks(); 
        $track->name = $validatedData['name'];
        $track->student_numbers = $validatedData['student_numbers'];
        $track->branch_name = $validatedData['branch_name'];
        $track->track_type = $validatedData['track_type'];
        $track->track_status = $validatedData['track_status'];
        $track->description = $validatedData['description'];
        $track->logo = $fileName; 
        $track->save();
        return to_route('tracks.index');
    }

    function edit($id)
    {
        $track = tracks::findOrFail($id);
        return view('Tracks.updateTrack',compact("track"));
    }
 
    function update(Request $request, $id)
    {
        $track = tracks::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'student_numbers' => 'required|integer',
            'branch_name' => 'required|string|max:255',
            'track_type' => 'required|string|max:255',
            'track_status' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('uploads'), $fileName);
            $validatedData['logo'] = $fileName; 
        }

        $track->update($validatedData);

        return redirect()->route('tracks.index');
    }
 

}
