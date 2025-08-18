<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('borrows') 
                -> join('students', 'borrows.student_id', '=', "students.id")
                -> join('books', 'borrows.book_id', '=', "books.id")
                -> select("borrows.*", "students.name", "students.photo", "books.title", "books.cover", "students.created_at as kobeBalaina" )
                -> where( 'borrows.status', "pending" )
                -> orWhere('borrows.status', "overdue")
                -> orderBy('return_date', 'asc')
                -> get();


        return view("borrow.index", [
            'borrows'       => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('borrows') -> insert([
            "student_id"        => $request -> student_id,
            "book_id"           => $request ->book_id,
            "issue_date"        => now(),
            "return_date"       => $request -> return_date,
            "created_at"        => now(),
        ]);

        $books_data = DB::table('books') -> where('id', $request -> book_id) -> first();

        DB::table('books') 
            -> where('id', $request -> book_id)
            -> update([
                'available_copy' => $books_data -> available_copy - 1
            ]);

        return back() -> with('success', "Successfully Assign a Book");
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        //
    }

    /**
     * Search student 
     */
    public function search(){

        $students = DB::table('students') -> get();
        return view("borrow.search_student", [
            "students"  => $students
        ]);
    }

    public function searchStudentGet(){
        return redirect('/borrow-search');
    }


    public function borrowAssign($id){

        $student = DB::table('students') 
            -> where('id', $id)
            -> first();

        $books = DB::table('books') 
            -> get();


        return view('borrow.assign_book', [
            'student'   => $student,
            'books'     => $books
        ]);
    }

    /**
     * Search Student Data 
     */
    public function searchStudent(Request $request) {
        $students = DB::table('students')
                    -> where('phone', $request -> search) 
                    -> orWhere('email', $request -> search) 
                    -> orWhere('student_id', $request -> search) 
                    -> get();   
                    
                    
        return view('borrow.search_student', [
            'students'=> $students   
        ]);
    
    }

    public function borrowReturned ($id, $book_id) {

        DB::table('borrows')
            -> where("id", $id) 
            -> update([
                "status"    => "returned"
            ]);

            $books_data = DB::table('books') -> where('id', $book_id) -> first();

        DB::table('books') 
            -> where('id', $book_id)
            -> update([
                'available_copy' => $books_data -> available_copy + 1
            ]);

            return back() -> with('success' , "Borrows status updated successful");
        
    }

    public function borrowOverdue ($id) {

        DB::table('borrows')
            -> where("id", $id) 
            -> update([
                "status"    => "overdue"
            ]);

            return back() -> with('success' , "Borrows status updated successful");
        
    }
}
