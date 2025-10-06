<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Writer;
use function Pest\Laravel\get;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('is_active',1)->paginate(2);
        return view('admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $writers=Writer::where('is_active',1)->get();
        return view('admin.book.create',compact('writers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->only('title','description','publication_date'));
        $book->writers()->attach($request->only('writers'));
        if ($book) {
            return redirect()->route('books.index');
        }
        return redirect()->route('books.create');
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
        $writers=Writer::where('is_active',1)->get();
        return view('admin.book.edit',compact('book','writers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $status=$book->update($request->only('title','description','publication_date'));
        $book->writers()->sync($request->only('writers'));
        if ($status) {
            return redirect()->route('books.index');
        }
        return redirect()->route('books.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
