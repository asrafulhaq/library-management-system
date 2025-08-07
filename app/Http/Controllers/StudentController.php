<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('students') -> get();
        return view('student.index', [
            'students'  => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation 
        $request -> validate([
            "name"      => "required",
            "email"     => "required|email",
            "phone"     => "required|starts_with:013,014,015,016,017,018,019",
        ]);

        // data save to DB
        DB::table('students') -> insert([
            "name"      => $request -> name,
            "email"      => $request -> email,
            "phone"      => $request -> phone,
            "student_id"      => $request -> sid,
            "address"       => $request -> address
        ]);

        // return back 
        return back() -> with('success', "Student created Successful");


    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
