<x-app-layout>
    {{-- Alert Message --}}
    @if (session('msg'))
        @if (session('status') == false)
            <div id="alert-border-3" class="flex p-4 mb-4 bg-green-100 border-t-4 border-green-500 dark:bg-green-200"
                role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="ml-3 text-sm font-medium text-green-700">
                    {{ session('msg') }}.
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-100 dark:bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 dark:hover:bg-green-300 inline-flex h-8 w-8"
                    data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @elseif (session('status') == true)
            <div id="alert-border-2" class="flex p-4 mb-4 bg-red-100 border-t-4 border-red-500 dark:bg-red-200"
                role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="ml-3 text-sm font-medium text-red-700">
                    {{ session('msg') }}.
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-100 dark:bg-red-200 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 dark:hover:bg-red-300 inline-flex h-8 w-8"
                    data-dismiss-target="#alert-border-2" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
    @endif
    {{-- Slide --}}
    @include('layouts.slide')

    <div class="flex max-w-8xl mx-auto mt-6 space-x-8 mb-10">
        <div class="w-8/12">
            @foreach ($data['categories'] as $category)
                @if (!empty($category->productsByParentCategory->toArray()))
                    <div class="w-full mb-10">
                        <div class="flex h-fit">
                            <h2 class="font-semibold text-3xl text-lime-700 w-10/12">{{ $category->name }}</h2>
                            <a href="{{ route('web.client.category.list', $category->id) }}"
                                class="flex w-2/12 place-content-end relative hover:color-orange-400">
                                <span class="font-base text-xl text-gray-700 mr-6">Xem thêm</span> 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="absolute bottom-4 h-3 mx-2 fill-gray-700">
                                    <path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" style="text-color: grey"/>
                                </svg>
                            </a>
                        </div>
                        <div class="w-full flex border border-gray-300 rounded-md mt-5 py-4 px-2">
                            @foreach ($category->productsByParentCategory->take(4) as $item)
                                <a href="{{ route('web.client.product.detail', $item->id) }}" class="w-3/12">
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
                                        <p class="text-lg">{{ $item->district . ', ' . $item->city }}</p>
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
                                        @else($item->expire_at > $now)
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
                    </div>
                @endif
            @endforeach
        </div>
        <div class="w-4/12 h-fit">
            @foreach ($data['banners'] as $banner)
                @if ($banner->index_position == 1 && $banner->path !== "")
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
                                
                                <p class="w-10/12 py-8 text-gray-9
                                00">{{ $category->name }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach

            </div>
            @foreach ($data['banners'] as $banner)
                @if ($banner->index_position == 2 && $banner->path !== "")
                <div class="w-full border border-gray-300 mt-10 h-52">
                        <img id="top-banner" class="object-fill h-full w-full"
                            src="{{ Illuminate\Support\Facades\Storage::url("banners/$banner->path") }}"
                            alt="">
                    </div>
                @endif
            @endforeach

            @foreach ($data['banners'] as $banner)
                @if ($banner->index_position == 3 && $banner->path !== "")
                <div class="w-full border border-gray-300 mt-10 h-52">
                        <img id="top-banner" class="object-fill h-full w-full"
                            src="{{ Illuminate\Support\Facades\Storage::url("banners/$banner->path") }}"
                            alt="">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="w-1/3 my-10 m-auto">
        <a class="backToTop flex space-x-4 justify-center">
            <p class="text-2xl">Trở về đầu trang</p>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-10 fill-lime-700">
                <path d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z"/>
            </svg>  
        </a>
        
    </div>
    <script>
        $(".backToTop").on("click",function(){
           $(window).scrollTop(0);
       });

       </script>
</x-app-layout>
