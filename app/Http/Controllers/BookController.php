<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // get all books 
        $books = DB::table('books') -> get();

        return view('book.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate 
        $request -> validate([
            'title'     => "required",
            'author'     => "required",
            "cover"     => "required|mimes:png,jpg,jpeg,gif|max:1024"
        ]);



        // generate a file name 
            $image = $request -> file('cover');

            $fileName =  md5(rand(100000,10000000) . '_' .time() . '_' . str_shuffle("qwertyuiopplkjhgfdsazxcvbnm")) .".". $image -> getClientOriginalExtension();

            // upload file 
            $image -> move(public_path('media/book'), $fileName);



        // data store 
        DB::table('books') -> insert([
            "title"             => $request -> title,
            "author"            => $request -> author,
            "isbn"              => $request -> isbn,
            "copy"              => $request -> copy,
            "cover"              => $fileName,
            "available_copy"     => $request -> copy,
            "created_at"        => now(),
        ]);

        // return 
        return back() -> with("success", "Books created successful");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
