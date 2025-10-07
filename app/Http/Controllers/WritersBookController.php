<?php

namespace App\Http\Controllers;

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
}
