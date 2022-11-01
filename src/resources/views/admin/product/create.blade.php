@extends('admin.layouts.master')
@section('title', 'Thêm sản phẩm')
@section('content')
    <div class="container">
        <div class="bg-blue-700 px-5 py-2">
            <p class="text-white font-semibold">Thêm sản phẩm</p>
        </div>
        <form action="{{ route('web.admin.product.saveCreate') }}" method="POST" class="w-8/12 ml-24 mt-5"
            enctype="multipart/form-data">
            @csrf
            <div class="flex mb-5">
                <p class="text-black text-sm w-3/12">Danh mục phụ<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <select class="w-full h-7 text-gray-700 text-sm bg-white border border-gray-500" name="category_id"
                        id="">
                        <option value="">Chọn danh mục phụ</option>
                        @foreach ($subCategory as $subCategory)
                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('category_id') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex">
                <p class="text-black w-3/12">Tên sản phẩm<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="text" name="name" value="{{ old('name') ?? '' }}" id=""
                        class="w-full border border-gray-500">
                    @if ($errors->has('name'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Mô tả</p>
                <textarea type="text" name="desc" id="" class="w-9/12 h-20 border border-gray-500">{{ old('desc') ?? '' }} </textarea>
            </div>
            <div class=" mt-5">
                <div class="flex">
                    <p class="text-black w-3/12">Ảnh đại diện sản phẩm<span class="text-red-700 ml-2">*</span></p>
                    <input class="text-sm text-gray-700" type="file" id="file-input" required name="avatar"
                        accept="image/png, image/jpeg" onchange="preview()">
                    <p hidden id="num-of-files"></p>
                </div>
                <div class="flex ml-10 mt-2" id="images"></div>
                @if ($errors->has('avatar.*'))
                    <p class="ml-2 text-red-600 text-md mt-3">{{ $errors->first('images.*') }}</p>
                @endif
                @foreach ($errors->get('avatar') as $message)
                    <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                @endforeach
            </div>
            <div class=" mt-5">
                <div class="flex">
                    <p class="text-black w-3/12">Images<span class="text-red-700 ml-2">*</span></p>
                    <div class="">
                    <input type="file" id="file-input-images" name="images[]" accept="image/png, image/jpeg"
                        onchange="preview()" class=" text-gray-700 text-sm" multiple>
                    <p hidden id="num-of-files"></p>
                    <div class="flex space-x-4 mt-2" id="images"></div>
                </div>
                @if ($errors->has('avatar.*'))
                    <p class="ml-2 text-red-600 text-md mt-3">{{ $errors->first('images.*') }}</p>
                @endif
                @foreach ($errors->get('avatar') as $message)
                    <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                @endforeach
            </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Đơn vị<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="text" name="unit" value="{{ old('unit') ?? '' }}" id=""
                        class="w-5/12 border border-gray-500">
                    @if ($errors->has('unit'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('unit') }}</span>
                    @endif
                </div>

            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Trọng lượng / Đơn vị<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="number" name="weight" value="{{ old('weight') ?? '' }}" id=""
                        class="w-2/12 border border-gray-500">
                    @if ($errors->has('weight'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('weight') }}</span>
                    @endif
                    <select class="bg-white border border-gray-500 text-gray-800 text-sm ml-2 h-6" name="weight_unit"
                        id="">
                        <option value="gram">Gram</option>
                        <option value="kg">Kg</option>
                    </select>
                </div>


            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Số lượng<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="number" name="quantity" value="{{ old('quantity') ?? '' }}" id=""
                        class="w-2/12 border border-gray-500">
                    @if ($errors->has('quantity'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('quantity') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Ngày hết hạn<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="date" name="expire_at" id="" value="{{ old('expire_at') ?? '' }}"
                        class="w-2/12 h-7 border border-gray-500 text-sm text-gray-700">
                    @if ($errors->has('expire_at'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('expire_at') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Địa chỉ<span class="text-red-700 ml-2">*</span></p>
                <div class="w-9/12">
                    <div class="flex">
                        <div class="flex-col w-9/12 h-10">
                            <select id="select-province"
                                class="bg-white border border-gray-500 text-gray-700 text-sm w-5/12 h-6" name="city">
                                <option value="" selected disabled hidden>Chọn tỉnh thành</option>
                                @foreach ($provinces as $key => $province)
                                    <option id="province-{{ $key }}" value="{{ $province->_name }}"
                                        data-districts="{{ $province->districts }}">
                                        {{ $province->_name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('city'))
                                <span class="text-red-700 text-sm"> {{ $errors->first('city') }}</span>
                            @endif
                        </div>
                        <div class="flex-col w-9/12">
                            <select id="select-district"
                                class="bg-white border border-gray-500 text-gray-700 text-sm w-5/12  h-6" name="district">
                                <option value="" selected disabled hidden>Chọn quận huyện</option>
                            </select>
                            @if ($errors->has('district'))
                                <span class="text-red-700 text-sm"> {{ $errors->first('district') }}</span>
                            @endif
                        </div>
                    </div>
                    <input type="text" name="address" id="" value="{{ old('address') ?? '' }}"
                        class="h-7 w-9/12 mt-5 border border-gray-500 text-sm text-gray-700"
                        placeholder="Nhập chi tiết thông tin địa chỉ">
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Số điện thoại<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="text" name="phone" id="" value="{{ old('phone') ?? '' }}"
                        class="h-7 border border-gray-500 text-sm w-5/12">
                    @if ($errors->has('phone'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Trạng thái<span class="text-red-700 ml-2">*</span></p>
                <div class="w-9/12 flex space-x-8 text-gray-700">
                    <div class="flex-col">
                        <div class="space-x-2">
                            <input type="radio" id="1" name="status" selected value="0">
                            <label>Hoạt động</label><br>
                        </div>
                        <div class="space-x-2">
                            <input type="radio" id="2" name="status" value="1">
                            <label>Không hoạt động</label><br>
                        </div>
                        @if ($errors->has('status'))
                            <span class="text-red-700 text-sm"> {{ $errors->first('status') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-3/12 space-x-2 mt-5 float-right flex justify-end">
                <a href="" class="bg-white border border-gray-500 rounded-md px-4 py-1">nhập lại</a>
                <button type="submit" class="bg-yellow-600 text-white rounded-md border-gray-500 px-4 py-1">Lưu</button>
            </div>
        </form>
    </div>
    <script>
        // let fileInput = document.getElementById("file-input");
        // let imageContainer = document.getElementById("images");
        // let numOfFiles = document.getElementById("num-of-files");

        // function preview() {
        //     imageContainer.innerHTML = "";
        //     numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

        //     for (i of fileInput.files) {
        //         let reader = new FileReader();
        //         let figure = document.createElement("figure");
        //         let figCap = document.createElement("figcaption");
        //         figure.appendChild(figCap);
        //         reader.onload = () => {
        //             let img = document.createElement("img");
        //             img.setAttribute("src", reader.result);
        //             img.setAttribute("width", 200);
        //             figure.insertBefore(img, figCap);
        //         }
        //         imageContainer.appendChild(figure);
        //         reader.readAsDataURL(i);
        //     }
        // }
        $(document).ready(function() {
            $('#select-province').on('change', function() {
                $('.district-box').remove();
                districtArr = $(this).find(":selected").data('districts');

                for (var i = 0; i < districtArr.length; i++) {
                    $('#select-district').append(`
                        <option value="` + districtArr[i]._name + `" class='district-box'>` + districtArr[i]._name + `</option>
                    `);
                }
            });
        });

        let fileInput = document.getElementById("file-input-images");
        let imageContainer = document.getElementById("images");
        let numOfFiles = document.getElementById("num-of-files");

        function preview() {
            console.log(fileInput.files.length);
            imageContainer.innerHTML = "";
            numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

            for (i of fileInput.files) {
                let reader = new FileReader();
                let figure = document.createElement("figure");
                let figCap = document.createElement("figcaption");
                figure.appendChild(figCap);
                reader.onload = () => {
                    let img = document.createElement("img");
                    img.setAttribute("src", reader.result);
                    img.setAttribute("class", 'w-32 h-24');
                    figure.insertBefore(img, figCap);
                }
                imageContainer.appendChild(figure);
                reader.readAsDataURL(i);
            }
        }
    </script>
@endsection
