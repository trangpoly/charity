<x-app-layout>
    <div class="flex max-w-8xl mx-auto mt-6 space-x-8 mb-10">
        <div class="w-8/12">
            <div class="flex">
                <p>Kết quả tìm kiếm cho "<span class="name_product">{{ $data['nameProduct'] }}</span>"</p>
            </div>
            <div class="flex">
                <form id="formSearch" action="{{ route('web.client.product.search') }}" method="GET"
                    class="space-x-4 mt-8 w-10/12">
                    <input type="hidden" name="name_product" value="{{ $data['nameProduct'] }}" id="">
                    <label class="text-xl mt-2">Sắp xếp theo</label>
                    <select class="w-3/12 border border-gray-300" name="sort" id="sort">
                        <option value="0"></option>
                        <option value="sap-het-han">Sắp hết hạn</option>
                        <option value="ngay-sap-het-han">Ngày hết hạn xa nhất</option>
                    </select>
                </form>
                <div class="w-2/12 mt-8">
                    <p id="count" class="font-base text-lg mt-2 text-gray-700 ">Tổng sản phẩm:
                        {{ count($data['products']) }}
                    </p>
                </div>
            </div>
            <div class="w-full flex flex-wrap border border-gray-300 rounded-md mt-5 py-4 px-2">
                @foreach ($data['products'] as $item)
                    <a href="{{ route('web.client.product.detail', $item->id) }}" class="w-3/12 mt-5">
                        <div class="h-48 relative mx-2">
                            <img src="{{ Illuminate\Support\Facades\Storage::url("images/$item->avatar") }}"
                                class="object-fill h-full w-full" alt="">
                            <img class="absolute bottom-4 right-2" width="25px"
                                src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                alt="">
                        </div>
                        <h3 class="text-2xl h-10 mx-2">{{ $item->name }}</h3>
                        <div class="flex py-2 space-x-4 h-16 items-center mx-2">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                class="w-1/12 h-fit mb-0" alt="">
                            <p class="text-lg">{{ $item->district . ',' . $item->city }}</p>
                        </div>
                        <div class="flex space-x-4 h-8 items-center mx-2">
                            @php
                                $expireDate = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                                $expireDate = date('Y-m-d', $expireDate);
                                $now = date('Y-m-d');
                            @endphp
                            @if ($item->expire_at == $now)
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                    class="w-1/12 h-fit" alt="">
                                <p class="text-orange-400 text-lg">
                                    {{ $item->expire_at }}
                                </p>
                            @elseif($item->expire_at < $now)
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                    class="w-1/12 h-fit" alt="">
                                <p class="text-orange-400 text-lg">
                                    Đã hết hạn
                                </p>
                            @else
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u144.svg?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                                    class="w-1/12 h-fit" alt="">
                                <p class="text-black text-lg">
                                    {{ $item->expire_at }}
                                </p>
                            @endif
                        </div>

                    </a>
                @endforeach
            </div>
            <div class="w-full mb-2 mr-6">
                <p class="">
                    {{ $data['products']->links() }}
                </p>
            </div>
        </div>
        <div class="w-4/12 h-fit">
            @foreach ($data['banners'] as $banner)
                @if ($banner->index_position == 1 && $banner->path !== '')
                    <div class="w-full border border-gray-300 h-72">
                        <img id="top-banner" class="object-fill h-full w-full"
                            src="{{ Illuminate\Support\Facades\Storage::url("banners/$banner->path") }}"
                            alt="">
                    </div>
                @endif
            @endforeach
            <div class="w-full border border-gray-300 h-fit mt-10">
                <div class="w-full flex text-xl px-2 font-semibold text-gray-800">
                    <div class="w-full flex items-center text-center py-2 px-4 space-x-4">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u36.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            class="w-2/12 p-3" alt="">
                        <p class="text-2xl">Tìm kiếm theo danh mục</p>
                    </div>
                </div>
                @foreach ($data['categories'] as $category)
                    @if (!$category->parent_id)
                        <a href="{{ route('web.client.category.list', $category->id) }}"
                            class="w-full flex text-lg px-1 font-semibold text-gray-800 hover:bg-lime-100">
                            <div class="w-full flex border-b border-lime-500">
                                <div class="image w-3/12 py-5 px-4">
                                    <img src="{{ Illuminate\Support\Facades\Storage::url("images/$category->image") }}"
                                        class="object-fill" alt="">
                                </div>
                                <p class="w-10/12 py-8 text-gray-900">
                                    {{ $category->name }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach

            </div>
            @foreach ($data['banners'] as $banner)
                @if ($banner->index_position == 2 && $banner->path !== '')
                    <div class="w-full border border-gray-300 mt-10 h-52">
                        <img id="top-banner" class="object-fill h-full w-full"
                            src="{{ Illuminate\Support\Facades\Storage::url("banners/$banner->path") }}"
                            alt="">
                    </div>
                @endif
            @endforeach

            @foreach ($data['banners'] as $banner)
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
        var element = $("#faker").children();
        $("#sort").change(function() {
            let sort = $("#sort").val();
            var searchParams = new URLSearchParams(window.location.search)
            var name_product = searchParams.get('name_product');
            $("#formSearch").submit()
        })
    </script>
</x-app-layout>
