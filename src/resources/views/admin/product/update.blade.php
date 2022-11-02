@extends('admin.layouts.master')
@section('title', ' Product Update')
@section('content')
    <div class="container">
        <div class="bg-blue-700 px-5 py-2">
            <p class="text-white font-semibold">Cập nhật sản phẩm</p>
        </div>
        <form action="{{ route('web.admin.product.saveUpdate', $product->id) }}" method="POST" id="form-request"
            class="w-8/12 ml-24 mt-5" enctype="multipart/form-data">
            @csrf
            <div class="flex mb-5">
                <p class="text-black text-sm w-3/12">Danh mục phụ<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <select class="w-full h-7 text-gray-700 text-sm bg-white border border-gray-500" name="category_id"
                        id="">
                        @foreach ($subCategory as $subCategory)
                            <option {{ $product->category_id == $subCategory->id ? 'selected' : '' }}
                                value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
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
                    <input type="text" name="name" id="" value="{{ $product->name }}"
                        class="w-full border text-sm text-gray-700 border-gray-500">
                    @if ($errors->has('name'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Mô tả</p>
                <textarea type="text" name="desc" id="" class="w-9/12 h-20 border text-sm text-gray-700 border-gray-500">{{ $product->desc }}</textarea>
            </div>
            <div class="mt-5">
                <div class="flex">
                    <p class="text-black w-3/12">Hình ảnh đại diện<span class="text-red-700 ml-2">*</span></p>
                    <input class=" text-gray-700 text-sm" name="avatar" id="" type="file"
                        onchange="previewAvatar()" value="{{ $product->avatar }}">
                    <div class="box-avatar">
                        <div class="relative">
                            <img class="avatar_preview my-3 mx-auto rounded-lg shadow-xl"
                                style="width: 250px; height: 250px;"
                                src="{{ asset('/storage/images/' . $product->avatar) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class=" mt-5">
                <div class="flex">
                    <p class="text-black w-3/12">Hình ảnh sản phẩm<span class="text-red-700 ml-2">*</span></p>
                    <input class=" text-gray-700 text-sm" name="images[]" id="multiple_files" type="file"
                        value="{{ $product->images }}" multiple onchange="previewImg()">
                    @if ($errors->has('images.*'))
                        <p class="ml-2 text-red-600 text-md mt-3">{{ $errors->first('images.*') }}</p>
                    @endif
                    @foreach ($errors->get('images') as $message)
                        <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                    @endforeach
                </div>
                <div class="flex m-4 box-images">
                    @foreach ($product->images as $item)
                        <div class="flex m-4">
                            <img style="height: 150px;width: 150px;" class="box-image mr-2 rounded-lg shadow-xl"
                                src="{{ asset('storage/images/' . $item->path) }}" alt=""> <a href=""
                                data-product-image-id="{{ $item->id }}"
                                class="absolute w-5 top-1 right-3 rounded-full bg-red-600 product-image-delete">
                                <svg className="w-6 h-6" fill="none" stroke="currentColor"
                                    onclick="deleteImage('{{ $item->id }}')" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Đơn vị<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="text" name="unit" value="{{ $product->unit }}" id=""
                        class="w-3/12 text-sm text-gray-700 border border-gray-500">
                    @if ($errors->has('unit'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('unit') }}</span>
                    @endif
                </div>

            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Trọng lượng / Đơn vị<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="number" name="weight" value="{{ $product->weight }}" id=""
                        class="w-2/12 border text-sm border-gray-500  text-gray-700">
                    @if ($errors->has('weight'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('weight') }}</span>
                    @endif
                    <select class="bg-white border border-gray-500 text-gray-800 text-sm ml-2 h-6" name="weight_unit"
                        id="">
                        <option {{ $product->weight_unit == 'gram' ? 'selected' : '' }} value="gram">Gram</option>
                        <option {{ $product->weight_unit == 'kg' ? 'selected' : '' }} value="kg">Kg</option>
                    </select>
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Số lượng<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="number" name="quantity" value="{{ $product->quantity }}" id=""
                        class="w-2/12 text-sm border border-gray-500 text-gray-700">
                    @if ($errors->has('quantity'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('quantity') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Ngày hết hạn<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="date" name="expire_at" id="" value="{{ $product->expire_at }}"
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
                                class="bg-white border border-gray-500 text-gray-700 text-sm w-5/12 h-6" name="city"
                                id="city" aria-label="Chọn danh mục con cho sản phẩm">
                                <option value="" selected disabled hidden>Chọn tỉnh thành</option>
                                @foreach ($provinces as $key => $province)
                                    <option id="province-{{ $key }}" value="{{ $province->name }}"
                                        data-districts="{{ $province->districts }}"
                                        @if ($province->name == $product->city) data-current-district = "{{ $product->district }}"
                                    selected @endif>
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('city'))
                                <span class="text-red-700 text-sm"> {{ $errors->first('city') }}</span>
                            @endif
                        </div>
                        <div class="flex-col w-9/12">
                            <select id="select-district"
                                class="bg-white border border-gray-500 text-gray-700 text-sm w-4/12  h-6" name="district"
                                id="district" aria-label="Chọn danh mục con cho sản phẩm">
                                <option value="" selected disabled hidden>Chọn quận huyện</option>
                            </select>
                            @if ($errors->has('district'))
                                <span class="text-red-700 text-sm"> {{ $errors->first('district') }}</span>
                            @endif
                        </div>
                    </div>
                    <input type="text" name="address" id="" value="{{ $product->address }}"
                        class="h-7 w-9/12 mt-5 border border-gray-500 text-sm text-gray-700"
                        placeholder="Nhập chi tiết thông tin địa chỉ">
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Số điện thoại<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="text" name="phone" id="" value="{{ $product->phone }}"
                        class="h-7 border border-gray-500 text-sm w-5/12 text-gray-700">
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
                            <input type="radio" id="1" name="status"
                                {{ $product->status == 0 ? 'checked' : '' }} value="0">
                            <label>Hoạt động</label><br>
                        </div>
                        <div class="space-x-2">
                            <input type="radio" id="2" name="status"
                                {{ $product->status == 1 ? 'checked' : '' }} value="1">
                            <label>Không hoạt động</label><br>
                        </div>
                        @if ($errors->has('status'))
                            <span class="text-red-700 text-sm"> {{ $errors->first('status') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-3/12 space-x-2 mt-5 float-right flex justify-end">
                <a href="" class="bg-white border border-gray-500 rounded-md px-4 py-1">Nhập lại</a>
                <button type="submit" class="bg-yellow-600 text-white rounded-md border-gray-500 px-4 py-1">Lưu</button>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function previewAvatar() {
            $(".avatar_preview").remove()
            var arrImgAdd = this.event.target.files;
            for (var i = 0; i < arrImgAdd.length; i++) {
                $(".box-avatar").append(`
                    <div class="relative flex ">
                        <img class="avatar_preview my-3 mx-auto w-[250px] h-[240px] rounded-lg shadow-xl" style="width: 250px; height: 250px;"
                            src="${URL.createObjectURL(arrImgAdd[i])}" alt="">
                    </div>
                    `);
            }
        }

        function previewImg() {
            $(".img_preview").remove()
            var arrImgAdd = this.event.target.files;
            for (var i = 0; i < arrImgAdd.length; i++) {
                $(".box-images").append(`
                    <div class="relative flex  m-4">
                        <img  class="image_add img_preview mr-2 rounded-lg shadow-xl"
                            src="${URL.createObjectURL(arrImgAdd[i])}"  style="height: 150px;width: 150px;" alt="">
                        <a href="" data-key = ${i}
                            class="absolute w-5 top-1 right-3 rounded-full bg-red-600 product-image-delete">
                            <svg className="w-6 h-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>
                    `);
            }
        }

        $(document).ready(function() {
            $('.product-image-delete').click(function(e) {
                e.preventDefault();
                $(this).parent().css('display', 'none');
            });
            $("#form-editPost").on("submit", function(e) {
                e.preventDefault();
                var imageIdHidden = [];
                $(".product-image-delete:hidden").each(function() {
                    imageIdHidden.push({
                        id: $(this).attr("data-product-image-id")
                    });
                })
                let formData = new FormData();
                formData.append("image_id", $('.product-image-delete:hidden').data('product-image-id'));
            });
            $('#select-province').on('change', function() {
                $('.district-box').remove();
                districtArr = $(this).find(":selected").data('districts');

                for (var i = 0; i < districtArr.length; i++) {
                    $('#select-district').append(`
                        <option value="` + districtArr[i].name + `" class='district-box'>` + districtArr[i].name + `</option>
                    `);
                }
            });

            $('#select-province option').each(function() {
                if (this.selected) {
                    districtArr = $(this).filter(':selected').data('districts');
                    currentDistrict = $(this).filter(':selected').data('current-district');
                    for (var i = 0; i < districtArr.length; i++) {
                        if (districtArr[i].name == currentDistrict) {
                            $('#select-district').append(`
                                <option value="` + districtArr[i].name + `" class='district-box' selected>` +
                                districtArr[i].name + `</option>
                            `);
                        } else {
                            $('#select-district').append(`
                                <option value="` + districtArr[i].name + `" class='district-box'>` + districtArr[i]
                                .name + `</option>
                            `);
                        }
                    }
                }
            });
        });

        function deleteImage(id) {
            console.log(id);
            var input = document.createElement("input");

            input.setAttribute("type", "hidden");

            input.setAttribute("name", "idImage[]");

            input.setAttribute("value", id);

            document.getElementById("form-request").appendChild(input);
        }
    </script>
@endsection
