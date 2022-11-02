@extends('admin.layouts.master')
@section('title', ' Edit User')
@section('content')
    <div class="container">
        <div class="bg-blue-700 px-5 py-2">
            <p class="text-white font-semibold">Edit User</p>
        </div>
        <form action="{{ route('web.admin.user.update', ['id' => $user->id]) }}" method="POST" class="w-8/12 ml-24 mt-5">
            @csrf          
            <div class="flex">
                <p class="text-black w-3/12">User Name<span class="text-red-700 ml-2">*</span></p>
                <div class="flex flex-col w-9/12">
                    <input type="text" name="name" id="" value="{{$user->name}}" class="w-full border border-gray-500">
                    @error('name')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Phone number<span class="text-red-700 ml-2">*</span></p>
                <div class="flex flex-col w-9/12">
                    <input type="text" name="phone_number" id="" value="{{$user->phone_number}}" class="w-full border border-gray-500">
                    @error('phone_number')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Email<span class="text-red-700 ml-2">*</span></p>
                <div class="flex flex-col w-9/12">
                    <input type="text" name="email" id="" value="{{$user->email}}" class="w-full border border-gray-500">
                    @error('email')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Status<span class="text-red-700 ml-2">*</span></p>
                <div class="flex flex-col w-9/12">
                    <div class="w-9/12 flex space-x-8 text-gray-700">
                        <div class="space-x-2">
                            <input type="radio" {{$user->deleted_at == null ? 'checked' : ''}} id="1" name="status" value="1">
                            <label for="1">Active</label><br>
                        </div>
                        <div class="space-x-2">
                            <input type="radio" {{$user->deleted_at != null ? 'checked' : ''}} id="2" name="status" value="0">
                            <label for="2">Unactive</label><br>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Facebook ID<span class="text-red-700 ml-2"></span></p>
                <input type="text" name="facebook_id" id="" value="{{$user->facebook_id}}" class="w-9/12 border border-gray-500">
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Google ID<span class="text-red-700 ml-2"></span></p>
                <input type="text" name="google_id" id="" value="{{$user->google_id}}" class="w-9/12 border border-gray-500">
            </div>
            <div class="w-1/3 space-x-2 mt-5 float-right flex justify-end">
                <a href="{{ route('web.admin.user.list') }}" class="bg-white border border-gray-500 px-4 py-1">Back</a>
                <button type="submit" class="bg-yellow-600 text-white border border-gray-500 px-4 py-1">Submit</button>
            </div>
        </form>
    </div>
@endsection
