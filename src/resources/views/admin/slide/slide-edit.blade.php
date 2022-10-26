@extends('admin.layouts.master')
@section('title', ' Slide Edit')
@section('content')
    <div class="container">
        <div class="bg-blue-700 px-5 py-2">
            <p class="text-white font-semibold">Slide Edit</p>
        </div>
        <form action="{{ route('web.admin.slide.update', ['id' => $slide->id]) }}" method="POST" class="w-8/12 ml-24 mt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class=" mt-5">
                <div class="flex">
                    <p class="text-black w-3/12">Image<span class="text-red-700 ml-2">*</span></p>
                    <input class="text-sm text-gray-700" type="file" id="file-input"
                        name="image"
                        accept="image/png, image/jpeg"
                        onchange="preview()">
                </div>
                <div class="flex ml-10 mt-2" id="preview-image">
                    <img id="current-img" src="{{ asset('/storage/images/'. $slide->path) }}" alt="" style="width: 1200">
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Status<span class="text-red-700 ml-2">*</span></p>
                <div class="w-9/12 flex space-x-8 text-gray-700">
                    <div class="flex-col">
                        <div class="space-x-2">
                            <input type="radio" id="1" name="status" value="0" @if ($slide->status == 0) checked @endif>
                            <label>Active</label><br>
                        </div>
                        <div class="space-x-2">
                            <input type="radio" id="2" name="status" value="1" @if ($slide->status == 1) checked @endif>
                            <label>Disable</label><br>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('error'))
            <p class="ml-2 text-red-600 text-md mt-3">{{ session('error') }}</p>
            @endif
            <div class="w-2/12 space-x-2 mt-5 float-right flex justify-end">
                <a href="{{ route('web.admin.slide.list') }}" class="bg-white border border-gray-500 rounded-md px-4 py-1">Back</a>
                <button type="submit" class="bg-yellow-600 text-white rounded-md border-gray-500 px-4 py-1">Save</button>
            </div>
        </form>
    </div>
    <script>
        let fileInput = document.getElementById("file-input");
        let imageContainer = document.getElementById("preview-image");

        function preview() {
            imageContainer.innerHTML = "";
            console.log(fileInput);

            for (i of fileInput.files) {
                let reader = new FileReader();
                let figure = document.createElement("figure");
                let figCap = document.createElement("figcaption");
                figure.appendChild(figCap);
                reader.onload = () => {
                    let img = document.createElement("img");
                    img.setAttribute("src", reader.result);
                    img.setAttribute("width", 1200);
                    figure.insertBefore(img, figCap);
                }
                imageContainer.appendChild(figure);
                reader.readAsDataURL(i);
            }
        }
    </script>
@endsection
