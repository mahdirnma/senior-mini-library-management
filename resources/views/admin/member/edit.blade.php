@extends('layout.app')
@section('title')
    update member
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-end items-center border-b">
                <h2 class="text-xl">update writer</h2>
            </div>
            <div class="flex w-full h-4/5">
                <form action="{{route('members.update',compact('member'))}}" method="post" class="w-full h-full flex flex-row-reverse">
                    @csrf
                    @method('put')
                    <div class="w-1/2 h-full flex flex-col items-end pr-20 relative">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="name" class="font-semibold ml-5">: name</label>
                            <input type="text" name="name" value="{{$member->name}}" id="name" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('name')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="age" class="font-semibold ml-5">: age</label>
                            <input type="number" name="age" value="{{$member->age}}" id="age" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('age')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="gender" class="font-semibold ml-5">: gender</label>
                            <select name="gender" id="gender" class="w-2/5 h-8 rounded outline-0 px-2 border border-gray-400">
                                <option value="male" {{$member->gender=='male'?'selected':""}}>male</option>
                                <option value="female" {{$member->gender=='female'?'selected':""}}>female</option>
                            </select>
                            @error('gender')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Update" class="absolute bottom-2 -left-10 text-white bg-gray-700 py-3 px-7 cursor-pointer rounded">
                    </div>
                    <div class="w-1/2 h-full flex flex-col items-end pr-20">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="phone" class="font-semibold ml-5">: phone</label>
                            <input type="text" name="phone" value="{{$member->phone}}" id="phone" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('phone')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
