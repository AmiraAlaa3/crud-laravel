<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\tracks;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index()
    {
        $students=Student::all();
        return view('students.studentsData',compact("students"));
    }
    function show($id)
    {
      $student=Student::findOrFail($id);
      return view('students.studentData',compact("student"));
    }
    function destroy($id)
    {
        $student=Student::findOrFail($id);
        if ($student->image) {
            $imagePath = public_path('uploads') . '/' . $student->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $student->delete();
        return to_route('students.index');
    }
    function create()
    {
      $tracks = tracks::all();
       return view('students.createStudent',compact("tracks"));
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|string',
            'grade' => 'required|integer',
            'gender' => 'required|string',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'track_id' => 'nullable|integer'
        ]);

        $fileName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('uploads'), $fileName);
        }

        $student = new Student();
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->grade = $validatedData['grade'];
        $student->gender = $validatedData['gender'];
        $student->address = $validatedData['address'];
        $student->image = $fileName;
        $student->track_id = $validatedData['track_id'];
        $student->save();
        return to_route('students.show',$student->id);
      }

      function edit($id)
      {
          $student = Student::findOrFail($id);
          $tracks = tracks::all();
          return view('students.updateStudent',compact("student","tracks"));
      }

      function update(Request $request, $id)
      {
          $student = Student::findOrFail($id);

          $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|string',
            'grade' => 'required|integer',
            'gender' => 'required|string',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'track_id' => 'nullable|integer'
        ]);

          if ($request->hasFile('image')) {
              $file = $request->file('image');
              $extension = $file->getClientOriginalExtension();
              $fileName = time() . '.' . $extension;
              $file->move(public_path('uploads'), $fileName);
              $validatedData['image'] = $fileName;
          }

          $student->update($validatedData);

          return to_route('students.index');
      }

}
