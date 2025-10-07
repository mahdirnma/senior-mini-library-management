<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWriterBookRequest;
use App\Models\Book;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WritersBookController extends Controller
{
    public function index(){
        $user=Auth::user();
        $writer=Writer::where('email',$user->email)->first();
        $books=$writer->books;
        return view('writer.index',compact('books'));
    }

    public function create()
    {
        return view('writer.create');
    }

    public function store(StoreWriterBookRequest $request)
    {
        $user=Auth::user();
        $writer=Writer::where('email',$user->email)->first();
        $book=Book::create($request->all());
        $writer->books()->attach($book->id);
        return redirect()->route('writer.books');
    }
}
