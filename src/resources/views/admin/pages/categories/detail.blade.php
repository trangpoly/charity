@extends('admin.layouts.master')
@section('title', ' Create Category')
@section('content')
    <div class="container">
        <div class="bg-blue-700 px-5 py-2">
            <p class="text-white font-semibold">Create Category</p>
        </div>
        <form id="formCate" class="w-8/12 ml-24 mt-5" method="POST" enctype="multipart/form-data">
            {{-- <div class="w-8/12 ml-24 mt-5"> --}}
            @csrf
            <div class="flex">
                <p class="text-black w-3/12">Category Name<span class="text-red-700 ml-2">*</span></p>
                <input type="text" name="name" id="name" value="{{ $parentCategory->name }}"
                    class="w-9/12 border border-gray-500">
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Image<span class="text-red-700 ml-2">*</span></p>
                <div class="w-3/12 flex justify-center items-center">
                    <label for="dropzone-file"
                        class="flex flex-col justify-center items-center w-full h-24 bg-gray-50 border-gray-300 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <img id="img_preview"
                            src="{{ Illuminate\Support\Facades\Storage::url("images/$parentCategory->image") }}"
                            class="w-full" alt="">
                        <input id="dropzone-file" type="file" name="image" onchange="previewImg()" class="hidden" />
                    </label>
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Status<span class="text-red-700 ml-2">*</span></p>
                <div class="w-9/12 flex space-x-8 text-gray-700">
                    <input type="radio" id="status" name="status" value="0"
                        {{ $parentCategory->status == 0 ? 'checked' : '' }} /> Active
                    <input type="radio" id="status" name="status" value="1"
                        {{ $parentCategory->status == 1 ? 'checked' : '' }} /> Deactive
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Show expiration date</p>
                <div class="w-9/12">
                    <div class="form-check form-switch">
                        <input
                            class="form-check-input appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top bg-no-repeat bg-contain bg-gray-500 focus:outline-none cursor-pointer shadow-sm"
                            type="checkbox" role="switch" {{ $parentCategory->expiration_date ? 'checked' : '' }}
                            id="flexSwitchCheckDefault" onclick="showExpirationDate()">
                    </div>
                    <input type="date" name="expiration_date"
                        value="{{ $parentCategory->expiration_date ? $parentCategory->expiration_date : '' }}"
                        id="btn_expiration_date" class="mt-10 w-full border border-gray-500"
                        style="display: {{ $parentCategory->expiration_date ? 'block' : 'none' }}">
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Sub-category</p>
                <div class="w-9/12 space-y-2" id="box_subCate">
                    <div class="w-full flex space-x-4 justify-items-center">
                        <input type="text" name="name_sub_add[]" class="name_sub_add w-10/12 border border-gray-500">
                        <a class="w-2/12" id="addInputSub">
                            <img class=""
                                src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u43.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                                alt="">
                        </a>
                    </div>
                    @foreach ($parentCategory->subCategory as $item)
                        <div class="w-full flex space-x-4 justify-items-center">
                            <input type="text" data-id="{{ $item->id }}" name="name_sub[]"
                                value="{{ $item->name }}" class="input-subCate w-10/12 border border-gray-500">
                            <a href="" class="w-2/12" id="removeInputSub">
                                <img class=""
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u45.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                                    alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-1/3 space-x-2 mt-5 float-right flex justify-end">
                <a href="" class="bg-white border border-gray-500 px-4 py-1">Back</a>
                <button type="submit" id="btnCate" value="{{ $parentCategory->id }}"
                    class="bg-yellow-600 text-white border border-gray-500 px-4 py-1">Submit</button>
            </div>
            {{-- </div> --}}
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
                x.value = null;
            } else {
                x.style.display = "block";
            }
        }

        $(document).ready(function() {
            var max_fields = 5;
            var wrapper = $("#box_subCate");
            var add_button = $("#addInputSub");
            var x = 1;

            $(add_button).click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(
                        `<div class="w-full flex space-x-4 justify-items-center" id="inputSub">
                            <input type="text" name="name_sub_add[]" class="name_sub_add w-10/12 border border-gray-500">
                            <a class="w-2/12" id="removeInputSub">
                                <img class=""
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u45.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                                    alt="">
                            </a>
                        </div>`
                    );
                } else {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click", "#removeInputSub", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $("#formCate").on('submit', function(e) {
                e.preventDefault();

                var sub_cate = [];
                var sub_cate_add = [];

                $(".input-subCate").each(function() {
                    sub_cate.push({
                        id: $(this).attr("data-id"),
                        name: $(this).val()
                    });
                })
                console.log(sub_cate);

                $(".name_sub_add").each(function(x) {
                    sub_cate_add.push(
                        $(".name_sub_add").val()
                    );
                })

                let formData = new FormData();
                formData.append("file", $('input[type=file]')[0].files[0]);
                formData.append("id", $("#btnCate").val());
                formData.append("name", $("#name").val());
                formData.append("status", $("#status:checked").val());
                formData.append("expiration_date", $("#btn_expiration_date").val());
                formData.append("sub_cate", JSON.stringify(sub_cate));
                formData.append("sub_cate_add", sub_cate_add);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('web.admin.category.update') }}",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        document.location.href = "http://localhost:8888/admin/category";
                    }
                })
            })
        })
    </script>
@endsection
