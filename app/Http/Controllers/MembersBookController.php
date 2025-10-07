<?php

namespace App\Http\Controllers;

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

}
