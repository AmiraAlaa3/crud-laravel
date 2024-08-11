<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Courses=Course::orderBy('created_at',"desc")->paginate(5);
        return view('Courses.index',compact("Courses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'name'=>'required|unique:courses|min:2',
            'description'=>'required|unique:courses|min:10|max:100',
            'totalGrade' => 'integer|min:0|max:100',
        ],[
            'name.unique'=>"this course name already exist",
            'name.min'=>"course name must be more than 2",
            'description.unique'=>'this course description already exist',
            'totalGrade.integer' => "The total grade must be an integer.",
            'totalGrade.min' => "The total grade must be at least 0.",
            'totalGrade.max' => "The total grade may not be greater than 100."
        ]);

        Course::create($validatedData);
        return to_route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validatedData =$request->validate([
            'name'=>'required:courses|min:2',
            'description'=>'required|min:10|max:500',
            'totalGrade' => 'required|min:0|max:100',
        ],[
            'name.min'=>"course name must be more than 2",
            'description.required'=>'this course description required',
            'totalGrade.integer' => "The total grade must be an integer.",
            'totalGrade.min' => "The total grade must be at least 0.",
            'totalGrade.max' => "The total grade may not be greater than 100."
        ]);

        $course->update($validatedData);
        return to_route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return to_route('courses.index');
    }
}
