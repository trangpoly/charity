@extends('admin.layouts.master')
@section('title', ' Create Category')
@section('content')
    <div class="container">
        <div class="bg-blue-700 px-5 py-2">
            <p class="text-white font-semibold">Create Category</p>
        </div>
        <form action="{{ route('web.admin.categories.saveAdd') }}" method="POST" class="w-8/12 ml-24 mt-5"
            enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <p class="text-black w-3/12">Category Name<span class="text-red-700 ml-2">*</span></p>
                <input type="text" name="name" id="" class="w-9/12 border border-gray-500">
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Image<span class="text-red-700 ml-2">*</span></p>
                <input type="file" name="image" id="" class="w-9/12 border border-gray-500">
                {{-- <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u40.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                    alt=""> --}}
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Status<span class="text-red-700 ml-2">*</span></p>
                <div class="w-9/12 flex space-x-8 text-gray-700">
                    <div class="space-x-2">
                        <input type="radio" id="1" name="status" value="0">
                        <label for="1">Active</label><br>
                    </div>
                    <div class="space-x-2">
                        <input type="radio" id="2" name="status" value="1">
                        <label for="2">Deactive</label><br>
                    </div>
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Show expiration date</p>
                <div class="w-9/12 form-check form-switch">
                    <input
                        class="form-check-input appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top bg-white bg-no-repeat bg-contain bg-gray-500 focus:outline-none cursor-pointer shadow-sm"
                        type="checkbox" role="switch" id="flexSwitchCheckDefault">
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Sub-category</p>
                <div class="w-9/12 space-y-2">
                    <div class="w-full flex space-x-4 justify-items-center">
                        <input type="text" name="name_sub[]" id="" class="w-10/12 border border-gray-500">
                        <a href="" class="w-2/12">
                            <img class=""
                                src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u43.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                                alt="">
                        </a>
                    </div>
                    <div class="w-full flex space-x-4 justify-items-center">
                        <input type="text" name="name_sub[]" id="" class="w-10/12 border border-gray-500">
                        <a href="" class="w-2/12">
                            <img class=""
                                src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u45.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                                alt="">
                        </a>
                    </div>
                    <div class="w-full flex space-x-4 justify-items-center">
                        <input type="text" name="name_sub[]" id="" class="w-10/12 border border-gray-500">
                        <a href="" class="w-2/12">
                            <img class=""
                                src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u45.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-1/3 space-x-2 mt-5 float-right flex justify-end">
                <a href="" class="bg-white border border-gray-500 px-4 py-1">Back</a>
                <button type="submit" class="bg-yellow-600 text-white border border-gray-500 px-4 py-1">Submit</button>
            </div>
        </form>
    </div>
@endsection
