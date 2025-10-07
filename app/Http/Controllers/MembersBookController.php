<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberBookRequest;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembersBookController extends Controller
{
    public function index(){
        $user=Auth::user();
        $member=Member::where('email',$user->email)->first();
        $books=$member->books;
        return view('member.index',compact('books'));
    }
    public function create(){
        $books=Book::where('is_active',1)->get();
        return view('member.create',compact('books'));
    }
    public function store(StoreMemberBookRequest $request){
        $user=Auth::user();
        $member=Member::where('email',$user->email)->first();
        $member->books()->attach($request->books);
        return redirect()->route('member.books');
    }
}
