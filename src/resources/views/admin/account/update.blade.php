@extends('admin.layouts.master')
@section('title', ' Account Update')
@section('content')
    <div class="container">
        <div class="bg-blue-700 px-5 py-2">
            <p class="text-white font-semibold">Account Update</p>
        </div>
        <form action="{{ route('web.admin.account.saveUpdate', $account->id) }}" method="POST" class="w-8/12 ml-24 mt-5"
            enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <p class="text-black w-3/12">Account Name<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="text" name="account" value="{{ $account->account }}" id=""
                        class="w-full border border-gray-500">
                    @if ($errors->has('account'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('account') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Name<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="text" name="name" value="{{ $account->name }}" id=""
                        class="w-full border border-gray-500">
                    @if ($errors->has('name'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Email<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="email" name="email" value="{{ $account->email }}" id=""
                        class="w-full border border-gray-500">
                    @if ($errors->has('email'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Password<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="password" name="password" value="{{ $account->password }}" id=""
                        class="w-full border border-gray-500">
                    @if ($errors->has('password'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black text-sm w-3/12">Role<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <select class="w-4/12 h-7 text-gray-700 text-sm bg-white border border-gray-500" name="role"
                        id="">
                        <option value="Admin">Admin</option>
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('category_id') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Status<span class="text-red-700 ml-2">*</span></p>
                <div class="w-9/12 flex space-x-8 text-gray-700">
                    <div class="flex-col">
                        <div class="space-x-2">
                            <input type="radio" id="1" name="status"
                                {{ $account->status == 0 ? 'checked' : '' }} value="0">
                            <label>Active</label><br>
                        </div>
                        <div class="space-x-2">
                            <input type="radio" id="2" name="status"
                                {{ $account->status == 1 ? 'checked' : '' }} value="1">
                            <label>Deactive</label><br>
                        </div>
                        @if ($errors->has('status'))
                            <span class="text-red-700 text-sm"> {{ $errors->first('status') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-2/12 space-x-2 mt-5 float-right flex justify-end">
                <a href="" class="bg-white border border-gray-500 rounded-md px-4 py-1">Back</a>
                <button type="submit" class="bg-yellow-600 text-white rounded-md border-gray-500 px-4 py-1">Save</button>
            </div>
        </form>
    </div>
@endsection
