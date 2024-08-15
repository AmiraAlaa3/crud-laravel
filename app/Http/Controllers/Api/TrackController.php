<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tracks;
use App\Http\Resources\TrackResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = tracks::all();
        return TrackResource::collection($tracks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'student_numbers' => 'required|integer',
            'branch_name' => 'required|string|max:255',
            'track_type' => 'required|string|max:255',
            'track_status' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('uploads'), $fileName);
            $data['logo'] = $fileName;
       }

        $track = tracks::create($data);

        return new TrackResource($track);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $track = tracks::findorFail($id);
       return new TrackResource($track);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $track = tracks::findorFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'student_numbers' => 'required|integer',
            'branch_name' => 'required|string|max:255',
            'track_type' => 'required|string|max:255',
            'track_status' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('uploads'), $fileName);
            $data['logo'] = $fileName;
       }

        $track->update($data);

        return new TrackResource($track);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   $track = tracks::find($id);
        if (!$track) {
            return response()->json(['error' => 'Track not found'], 404);
        }
        if ($track->image) {
            $imagePath = 'public/uploads/' . $track->image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }
        $track->delete();

        return response()->json(['message' => 'track deleted successfully']);

    }
}
