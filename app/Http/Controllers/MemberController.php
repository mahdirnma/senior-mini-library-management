<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\User;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members=Member::where('is_active',1)->paginate(2);
        return view('admin.member.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $member=Member::create($request->only('name','email','age','gender','phone'));
        $user=User::create([
            ...$request->only('name','email','password'),
            'role'=>'member',
        ]);
        if($member && $user){
            return redirect()->route('members.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.member.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $status=$member->update($request->only('name','age','gender','phone'));
        $user=User::where('email',$member->email)->first();
        $status=$user->update($request->only('name'));
        if($status){
            return redirect()->route('members.index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
