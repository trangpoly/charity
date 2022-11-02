<x-app-layout>
    <div class="flex max-w-8xl mx-auto mt-16 space-x-8 mb-10">
        <div class="w-8/12">
            <div class="flex">
                <a href="#" class="font-semibold text-2xl text-lime-700 w-10/12">{{ $category->name }}</a>
            </div>
            @foreach ($subCategory as $item)
                <div class="w-full mt-10">
                    <div class="flex">
                        <h2 class="font-semibold text-3xl text-lime-700 w-10/12">{{ $item->name }}</h2>
                        @if ($item->loadCount('products')->products_count != 0)
                            <a href="{{ route('web.client.subCategory.list', $item->id) }}"
                                class="flex w-2/12 place-content-end relative hover:color-orange-400">
                                <span class="font-base text-xl text-gray-700 mr-6">Xem thêm</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                    class="absolute bottom-4 h-3 mx-2 fill-gray-700">
                                    <path
                                        d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                        style="text-color: grey" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    @if ($item->loadCount('products')->products_count == 0)
                        <div class="w-full flex border border-gray-300 rounded-md mt-5 py-4 px-2">
                            <h3>Không có sản phẩm nào!!!</h3>
                        </div>
                    @else
                        <div class="w-full flex border border-gray-300 rounded-md mt-5 py-4 px-2">
                            @foreach ($item->products as $key => $faker)
                                    @if ($key == 4)
                                        @break
                                    @endif
                                <a href="{{ route('web.client.product.detail', $faker->id) }}" class="w-3/12">
                                    <div class="h-48 relative mx-2">
                                        <img src="{{ Illuminate\Support\Facades\Storage::url("images/$faker->avatar") }}"
                                            class="object-fill h-full w-full" alt="">
                                        @if (!Auth::user())
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-8 absolute bottom-2 right-2 fill-white" viewBox="0 0 512 512">
                                                <path
                                                    d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                            </svg>
                                        @endif

                                        @if (Auth::user())
                                            @if ($faker->favourite && $faker->favourite->user_id == Auth::user()->id)
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-8 absolute bottom-2 right-2 fill-orange-400"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-8 absolute bottom-2 right-2 fill-white"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                    <h3 class="text-2xl h-6 mx-2">{{ $faker->name }}</h3>
                                    <div class="flex py-2 space-x-4 h-16 items-center mx-2">
                                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                            class="w-1/12 h-fit mb-0" alt="">
                                        <p class="text-lg">{{ $faker->district . ', ' . $faker->city }}</p>
                                    </div>
                                    <div class="flex space-x-4 h-10 items-center mx-2">
                                        @php
                                            $expireDate = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                                            $expireDate = date('Y-m-d', $expireDate);
                                            $now = date('Y-m-d');
                                        @endphp
                                        @if ($faker->expire_at == $now)
                                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                                class="w-1/12 h-fit" alt="">
                                            <p class="text-orange-400 text-lg">
                                                {{ $faker->expire_at }}
                                            </p>
                                        @elseif($faker->expire_at < $now)
                                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                                class="w-1/12 h-fit" alt="">
                                            <p class="text-orange-400 text-lg">
                                                Đã hết hạn
                                            </p>
                                        @else
                                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u144.svg?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                                                class="w-1/12 h-fit" alt="">
                                            <p class="text-black text-lg">
                                                {{ $faker->expire_at }}
                                            </p>
                                        @endif
                                    </div>
                                    @if ($faker->stock == 0 || $faker->stock == -1)
                                        <div class="flex py-2 space-x-4 h-8 items-center mx-2">
                                            <p class="text-base">Hết hàng!</p>
                                        </div>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="w-4/12 h-fit">
            @foreach ($banners as $banner)
                @if ($banner->index_position == 1 && $banner->path !== '')
                    <div class="w-full border border-gray-300 h-72">
                        <img id="top-banner" class="object-fill h-full w-full"
                            src="{{ Illuminate\Support\Facades\Storage::url("banners/$banner->path") }}" alt="">
                    </div>
                @endif
            @endforeach
            <div class="w-full border border-gray-300 h-fit mt-10">
                <form action="{{ route('web.client.product.submitSearch', $id) }}" method="GET">
                    @csrf
                    <input type="hidden" name="sort" value="">
                    <div class="w-full flex text-xl px-2 font-semibold text-gray-800">
                        <div class="w-full flex items-center text-center py-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u36.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                class="w-2/12 p-5" alt="">
                            <p class="text-3xl">Tìm kiếm {{ $category->name }}</p>
                        </div>
                    </div>
                    <div class="w-full flex text-lg px-5 text-gray-800 hover:bg-lime-100">
                        <div class="w-full pb-5 border-b border-lime-500">
                            <p class="w-10/12 py-5 text-2xl font-semibold">Chọn danh mục</p>
                            <div class="grid grid-cols-2 w-full">
                                @foreach ($subCategory as $subCate)
                                    <div class="space-x-4">
                                        <input class="mx-4 h-6 w-6" name="subCate[]" value="{{ $subCate->id }}"
                                            type="checkbox" id="">{{ $subCate->name }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="w-full flex text-lg px-5  text-gray-800 hover:bg-lime-100">
                        <div class="w-full  border-b border-lime-500">
                            <p class="w-full text-2xl py-5 font-semibold">Chọn khu vực</p>
                            <div class="w-full pb-8">
                                <div class="w-full flex mb-5 space-x-8">
                                    <label class="w">Tỉnh thành</label>
                                    <select id="select-province" class="w-8/12 h-10" name="city">
                                        <option value="" selected disabled hidden>Chọn tỉnh thành</option>
                                        @foreach ($provinces as $key => $province)
                                            <option id="province-{{ $key }}" value="{{ $province->name }}"
                                                data-districts="{{ $province->districts }}">
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full flex space-x-5">
                                    <label class="w">Quận Huyện</label>
                                    <select id="select-district" class="w-8/12 h-10" name="district">
                                        <option value="" selected disabled hidden>Chọn quận huyện</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex  px-5  text-gray-800 hover:bg-lime-100">
                            <div class="w-full  border-b border-lime-500">
                                <p class="w-10/12 py-5 font-semibold text-2xl">Hạn sử dụng</p>
                                <div class="w-full pb-6 flex ">
                                    <input class="mx-4 w-6/12" type="date" name="dateStart">
                                    <p class="font-semibold text-2xl mt-2">~</p>
                                    <input class="mx-4 w-6/12" type="date" name="dateEnd">
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex text-2xl px-5  text-gray-800 hover:bg-lime-100">
                            <div class="w-full space-x-4 mt-4 mb-4">
                                <input type="checkbox" name="expired" value="1" class="w-6 h-6 mx-4">
                                Thực phẩm sắp hết hạn
                            </div>
                        </div>
                        <div class="w-full flex text-2xl px-5  text-with-800 hover:bg-lime-100">
                            <div class="w-full mt-4 mb-4 text-center">
                                <button type="submit"
                                    class="rounded-md py-2 px-8 bg-yellow-600 text-white font-semibold text-2xl hover:bg-lime-500">Tìm
                                    kiếm
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @foreach ($banners as $banner)
                @if ($banner->index_position == 2 && $banner->path !== '')
                    <div class="w-full border border-gray-300 mt-10 h-52">
                        <img id="top-banner" class="object-fill h-full w-full"
                            src="{{ Illuminate\Support\Facades\Storage::url("banners/$banner->path") }}"
                            alt="">
                    </div>
                @endif
            @endforeach

            @foreach ($banners as $banner)
                @if ($banner->index_position == 3 && $banner->path !== '')
                    <div class="w-full border border-gray-300 mt-10 h-52">
                        <img id="top-banner" class="object-fill h-full w-full"
                            src="{{ Illuminate\Support\Facades\Storage::url("banners/$banner->path") }}"
                            alt="">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#select-province').on('change', function() {
                $('.district-box').remove();
                districtArr = $(this).find(":selected").data('districts');

<<<<<<< HEAD
            for (var i = 0; i < districtArr.length; i++) {
                $('#select-district').append(`
                        <option value="` + districtArr[i].name + `" class='district-box'>` + districtArr[i].name + `</option>
                    `);
            }
=======
                for (var i = 0; i < districtArr.length; i++) {
                    $('#select-district').append(`
                            <option value="` + districtArr[i]._name + `" class='district-box'>` + districtArr[i]._name + `</option>
                        `);
                }
            });
>>>>>>> 0475d261510c37f96943006228225e4b0a23c074
        });
    </script>
</x-app-layout>
