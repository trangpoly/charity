<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto py-6">
            <h2 class="font-semibold text-3xl text-gray-800">
                Cập Nhập Bài Viết
            </h2>
        </div>
    </header>
    <div class="flex max-w-8xl mx-auto mt-16 space-x-8 mb-10">
        <div class="flex w-8/12 bg-white rounded-lg border border-gray-700">
            <div class="w-full m-4">
                <form id="form-editPost" action="{{ route('web.posts.update', ['id' => $post->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-5">
                        <label for="" class="mb-3 block text-base font-medium text-[#07074D]">
                            Danh mục sản phẩm con
                        </label>
                        <select
                            class="form-select appearance-none
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="category_id" id="category_id" aria-label="Chọn danh mục con cho sản phẩm">
                            <option value="" selected disabled hidden>Chọn danh mục con cho sản phẩm</option>
                            @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}"
                                    @if ($post->category_id == $subCategory->id) selected @endif>{{ $subCategory->name }}</option>
                            @endforeach
                        </select>
                        @foreach ($errors->get('category_id') as $message)
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                        @endforeach
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Tên sản phẩm
                        </label>
                        <input type="text"
                            class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="name" id="name" value="{{ @$post->name }}" />
                        @foreach ($errors->get('name') as $message)
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                        @endforeach
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Mô tả sản phẩm
                        </label>
                        <textarea rows="4" name="desc" id="message" placeholder=""
                            class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ @$post->desc }}</textarea>
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Ảnh đại diện sản phẩm
                        </label>
                        <input
                            class="block w-full text-sm text-gray-400 bg-white rounded border border-gray-300 cursor-pointer focus:outline-none "
                            name="avatar" id="" type="file" onchange="previewAvatar()" value="{{ $post->avatar }}">
                        <div class="box-avatar">
                            <div class="relative">
                                <img class="avatar_preview my-3 mx-auto w-[360px] h-[240px] rounded-lg shadow-xl"
                                    src="{{ asset('/storage/images/' . $post->avatar) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Hình ảnh sản phẩm
                        </label>
                        <input
                            class="block w-full text-sm text-gray-400 bg-white rounded border border-gray-300 cursor-pointer focus:outline-none "
                            name="images[]" id="multiple_files" type="file" value="{{ $post->images }}" multiple
                            onchange="previewImg()">
                        <input type="hidden" name="images_old" value={{ $post->images }}>
                        <input type="hidden" name="images_remove" id="imgRemove" value="" hidden>
                        <div class="flex m-4 box-images">
                            @foreach ($post->images as $item)
                                <div class="relative">
                                    <img class="box-image mr-2 w-[120px] h-[80px] rounded-lg shadow-xl"
                                        src="{{ asset('storage/images/' . $item->path) }}" alt="">
                                    <a href="" data-product-image-id="{{ $item->id }}"
                                        class="absolute w-5 top-1 right-3 rounded-full bg-red-600 product-image-delete">
                                        <svg className="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        @if ($errors->has('images.*'))
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $errors->first('images.*') }}</p>
                        @endif
                        @if (session('limitImgMsg'))
                            <p class="ml-2 text-red-600 text-md mt-3">{{ session('limitImgMsg') }}</p>
                        @endif
                        @foreach ($errors->get('images') as $message)
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                        @endforeach
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Đơn vị
                        </label>
                        <input type="text"
                            class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="unit" id="unit" value="{{ @$post->unit }}" />
                    </div>
                    <div class="mb-5 flex">
                        <label for="" class="mb-3 block text-base font-medium text-[#07074D]">
                            Trọng lượng / đơn vị
                        </label>
                        <input type="number" min="1"
                            class="
                            form-control
                            block
                            w-[156px]
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            ml-12
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="weight" id="weight" value="{{ @$post->weight }}" />
                        <select
                            class="form-select appearance-none
                                w-[80px]
                                ml-4
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="weight_unit" id="weight_unit" aria-label="Chọn danh mục con cho sản phẩm">
                            <option value="g" @if ($post->weight_unit == 'g') selected @endif>G</option>
                            <option value="kg" @if ($post->weight_unit == 'kg') selected @endif>KG</option>
                        </select>
                        @foreach ($errors->get('weight') as $message)
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                        @endforeach
                    </div>
                    <div class="mb-5 flex">
                        <label for="" class="mb-3 block text-base font-medium text-[#07074D]">
                            Số lượng
                        </label>
                        <input type="number" min="1"
                            class="
                            form-control
                            block
                            w-[156px]
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            ml-[124px]
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="quantity" id="quantity" value="{{ @$post->quantity }}" />
                        @foreach ($errors->get('quantity') as $message)
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                        @endforeach
                    </div>
                    <div class="mb-5 flex">
                        <label for="" class="mb-3 block text-base font-medium text-[#07074D]">
                            Hạn sử dụng
                        </label>
                        <div class="relative ml-[100px]">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker="" type="text" name="expire_at" id="expire_at" datepicker
                                value="{{ @$post->expire_at }}" datepicker-format="yyyy/mm/dd"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                                placeholder="Chọn hạn sử dụng">
                        </div>
                        @foreach ($errors->get('expire_at') as $message)
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                        @endforeach
                    </div>
                    <div class="mb-5 flex flex-cols-2">
                        <label for="" class="mb-3 block text-base font-medium text-[#07074D]">
                            Địa chỉ
                        </label>
                        <select id="select-province"
                            class="form-select appearance-none
                                w-[350px]
                                ml-32
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="city" id="city" aria-label="Chọn danh mục con cho sản phẩm">
                            <option value="" selected disabled hidden>Chọn tỉnh thành</option>
                            @foreach ($provinces as $key => $province)
                            <option id="province-{{ $key }}"
                                value="{{ $province->_name }}"
                                data-districts="{{ $province->districts }}"
                                @if ($province->_name == $post->city)
                                    data-current-district = "{{ $post->district }}"
                                    selected
                                @endif>
                                {{ $province->_name }}
                            </option>
                            @endforeach
                        </select>
                        <select id="select-district"
                            class="form-select appearance-none
                                w-[240px]
                                ml-4
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="district" id="district" aria-label="Chọn danh mục con cho sản phẩm">
                            <option value="" selected disabled hidden>Chọn quận huyện</option>
                        </select>
                        @foreach ($errors->get('city') as $message)
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                        @endforeach
                        @foreach ($errors->get('district') as $message)
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                        @endforeach
                    </div>
                    <div class="mb-5">
                        <input type="text"
                            class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="address" id="address" value="{{ @$post->address }}" />
                        @foreach ($errors->get('address') as $message)
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                        @endforeach
                    </div>
                    <div class="mb-5">
                        <label for="" class="mb-3 block text-base font-medium text-[#07074D]">
                            Số điện thoại liên hệ
                        </label>
                        <input type="number"
                            class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="phone" id="phone" value="{{ @$post->phone }}" />
                        @foreach ($errors->get('phone') as $message)
                            <p class="ml-2 text-red-600 text-md mt-3">{{ $message }}</p>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="hover:shadow-form rounded-md bg-[#ffaa00] py-3 px-8 text-lg font-semibold text-white outline-none">
                            CẬP NHẬP BÀI VIẾT
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-4/12 h-fit">
            <div class="w-full border border-gray-700 h-60"></div>
            <div class="w-full border border-gray-700 h-fit mt-10">
                <div class="w-full flex text-xl px-2 font-semibold text-gray-800">
                    <div class="w-full flex items-center text-center py-4">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u36.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            class="w-2/12 p-5" alt="">
                        <p class="text-3xl">Tìm kiếm theo danh mục</p>
                    </div>
                </div>
                <div class="w-full flex text-2xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                    <div class="w-full flex border-b border-lime-500">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u66.png?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                            class="w-3/12 p-5" alt="">
                        <p class="w-10/12 py-10">Nông sản</p>
                    </div>
                </div>
                <div class="w-full flex text-2xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                    <div class="w-full flex border-b border-lime-500">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u69.png?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                            class="w-3/12 p-5" alt="">
                        <p class="w-10/12 py-10">Đồ ăn trong ngày</p>
                    </div>
                </div>
                <div class="w-full flex text-2xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                    <div class="w-full flex border-b border-lime-500">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u70.png?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                            class="w-3/12 p-5" alt="">
                        <p class="w-10/12 py-10">Thực phẩm đóng gói</p>
                    </div>
                </div>
                <div class="w-full flex text-2xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                    <div class="w-full flex">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u71.png?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                            class="w-3/12 p-5" alt="">
                        <p class="w-10/12 py-10">Đồ dùng sinh hoạt</p>
                    </div>
                </div>
            </div>
            <div class="w-full border border-gray-700 mt-10 h-32"></div>
            <div class="w-full border border-gray-700 mt-10 h-32"></div>
        </div>
    </div>
    <script type="text/javascript">
        function previewAvatar() {
            $(".avatar_preview").remove()
            var arrImgAdd = this.event.target.files;
            for (var i = 0; i < arrImgAdd.length; i++) {
                $(".box-avatar").append(`
                    <div class="relative ">
                        <img class="avatar_preview my-3 mx-auto w-[360px] h-[240px] rounded-lg shadow-xl"
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
                    <div class="relative ">
                        <img class="image_add img_preview mr-2 w-[120px] h-[80px] rounded-lg shadow-xl"
                            src="${URL.createObjectURL(arrImgAdd[i])}" alt="">
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
            var imgRemove = [];

            $(".product-image-delete").on("click", function(e) {
                e.preventDefault();

                $(this).parent('div').remove();
                var key = $(this).attr("data-key");

                for (let i = 0; i < arrImgAdd.length; i++) {
                    if (i == key) {
                        imgRemove.push(arrImgAdd[i].name)
                    }
                }
                console.log(imgRemove);
                $("#imgRemove").val(JSON.stringify(imgRemove))
            })
        }

        $(document).ready(function() {
            $('.product-image-delete').click(function(e) {
                e.preventDefault();

                var product_image_id = $(this).data('product-image-id');
                $(this).parent().css('display', 'none');
                $(this).parent().append(`
                        <input
                            class="block w-full text-sm text-gray-400 bg-white rounded border border-gray-300 cursor-pointer focus:outline-none "
                            name="images_hidden[]" id="multiple_files"
                            value="` + product_image_id + `">
                `);
            });

            $('#select-province').on('change', function() {
                $('.district-box').remove();
                districtArr = $(this).find(":selected").data('districts');

                for (var i = 0; i < districtArr.length; i++) {
                    $('#select-district').append(`
                        <option value="`+ districtArr[i]._name +`" class='district-box'>`+ districtArr[i]._name +`</option>
                    `);
                }
            });

            $('#select-province option').each(function () {
                if (this.selected)
                {
                    districtArr = $(this).filter(':selected').data('districts');
                    currentDistrict = $(this).filter(':selected').data('current-district');
                    console.log(districtArr, currentDistrict);

                    for (var i = 0; i < districtArr.length; i++) {
                        if (districtArr[i]._name == currentDistrict) {
                            $('#select-district').append(`
                                <option value="`+ districtArr[i]._name +`" class='district-box' selected>`+ districtArr[i]._name +`</option>
                            `);
                        } else {
                            $('#select-district').append(`
                                <option value="`+ districtArr[i]._name +`" class='district-box'>`+ districtArr[i]._name +`</option>
                            `);
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
