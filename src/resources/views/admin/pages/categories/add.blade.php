@extends('admin.layouts.master')
@section('title', ' Create Category')
@section('content')
    <div class="container">
        <div class="bg-blue-700 px-5 py-2">
            <p class="text-white font-semibold">Create Category</p>
        </div>
        <form action="{{ route('web.admin.category.store') }}" method="POST" class="w-8/12 ml-24 mt-5"
            enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <p class="text-black w-3/12">Category Name<span class="text-red-700 ml-2">*</span></p>
                <div class="w-9/12">
                    <input type="text" name="name" class="w-full border border-gray-500">
                    @error('name')
                    <div class="text-red-600 mt-2 col-12">{{ $message }}</div>
                    @enderror
                </div>
                
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Image<span class="text-red-700 ml-2">*</span></p>
                <div class="w-3/12 flex">
                    <label for="dropzone-file"
                        class="flex flex-col w-full h-fit bg-gray-50 border-gray-300 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <img id="img_preview"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u40.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                            class="w-10/12" alt="">
                        <input id="dropzone-file" type="file" name="image" onchange="previewImg()" class="hidden" />
                        @error('image')
                            <div class="text-red-600 mt-2 col-12">{{ $message }}</div>
                        @enderror
                    </label>
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Status<span class="text-red-700 ml-2">*</span></p>
                <div class="w-9/12 flex space-x-8 text-gray-700">
                    <div class="space-x-2">
                        <input type="radio" id="1" name="status" value="1" checked>
                        <label for="1">Active</label><br>
                    </div>
                    <div class="space-x-2">
                        <input type="radio" id="2" name="status" value="2">
                        <label for="2">Deactive</label><br>
                    </div>
                    @error('status')
                        <div class="text-danger mt-5 pt-2 col-12">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Show expiration date</p>
                <div class="w-9/12">
                    <div class="form-check form-switch">
                        <input
                            class="form-check-input appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top bg-no-repeat bg-contain bg-gray-500 focus:outline-none cursor-pointer shadow-sm"
                            type="checkbox" role="switch" id="flexSwitchCheckDefault" onclick="showExpirationDate()">
                    </div>
                    <input type="date" name="expiration_date" id="btn_expiration_date"
                        class="mt-10 w-full border border-gray-500" style="display: none">
                </div>

            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Sub-category</p>
                <div class="w-9/12 space-y-2" id="box_subCate">
                    <div class="w-full flex space-x-4 justify-items-center">
                        <input type="text" name="name_sub[]" id="" class="w-10/12 border border-gray-500">
                        <a class="w-2/12" id="addInputSub">
                            <img class=""
                                src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u43.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-1/3 space-x-2 mt-5 float-right flex justify-end">
                <a href="{{ route("web.admin.category.list") }}" class="bg-white border border-gray-500 px-4 py-1">Back</a>
                <button type="submit" class="bg-yellow-600 text-white border border-gray-500 px-4 py-1">Submit</button>
            </div>
        </form>
    </div>
    <script>
        function previewImg() {
            document.getElementById('img_preview').src = URL.createObjectURL(event.target.files[0]);
        }

        function showExpirationDate() {
            var x = document.getElementById("btn_expiration_date");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }

        $(document).ready(function() {
            var max_fields = 10;
            var wrapper = $("#box_subCate");
            var add_button = $("#addInputSub");
            var x = 1;

            $(add_button).click(function(e) {
                e.preventDefault();
                    $(wrapper).append(
                        `<div class="w-full flex space-x-4 justify-items-center" id="inputSub">
                            <input type="text" name="name_sub[]" class="w-10/12 border border-gray-500">
                            <a class="w-2/12" id="removeInputSub">
                                <img class=""
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u45.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                                    alt="">
                            </a>
                        </div>`
                    );
            });

            $(wrapper).on("click", "#removeInputSub", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
@endsection
