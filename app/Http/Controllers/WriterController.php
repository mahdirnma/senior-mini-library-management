<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Writer;
use App\Http\Requests\StoreWriterRequest;
use App\Http\Requests\UpdateWriterRequest;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $writers = Writer::where('is_active', 1)->paginate(2);
        return view('admin.writer.index', compact('writers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.writer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWriterRequest $request)
    {
        $writer=Writer::create($request->only('name','age','gender','phone','email'));
        $user=User::create([
            ...$request->only('name','email','password'),
            'role'=>'writer'
        ]);
        if($user && $writer){
            return redirect()->route('writers.index');
        }
        return redirect()->route('writers.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Writer $writer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Writer $writer)
    {
        return view('admin.writer.edit', compact('writer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWriterRequest $request, Writer $writer)
    {
        $status=$writer->update($request->only('name','age','gender','phone'));
        $user=User::where('email',$writer->email)->first();
        $status=$user->update($request->only('name'));
        if($status){
            return redirect()->route('writers.index');
        }
        return redirect()->route('writers.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Writer $writer)
    {
        //
    }
}
