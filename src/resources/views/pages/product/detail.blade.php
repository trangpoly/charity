<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-3xl text-gray-800">
            {{ __('Chi tiết sản phẩm') }}
        </h2> --}}
    </x-slot>

    <nav class="flex mx-auto max-w-8xl my-7" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('web.client.category.list', $product->subCategory->category->id) }}"
                    class="inline-flex text-xl items-center font-medium text-green-600 hover:text-green-400 dark:text-gray-400 dark:hover:text-white active:text-green-500 underline underline-offset-1">
                    {{-- <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg> --}}
                    {{ $product->subCategory->category->name }}
                </a>
            </li>
            <li class="inline-flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('web.client.subCategory.list', $product->subCategory->id) }}"
                    class="inline-flex ml-2 text-xl items-center font-medium text-green-600 hover:text-green-400 active:text-green-500 underline underline-offset-1">
                    {{-- <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg> --}}
                    {{ $product->subCategory->name }}
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span
                        class="ml-1 text-xl font-medium text-slate-500 md:ml-2 dark:text-gray-400 underline underline-offset-1">{{ $product->name }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex max-w-8xl mx-auto mt-16 space-x-8 mb-10">
        <div class="w-8/12">
            <div class=" h-fit border border-slate-400 rounded-md p-7">
                <div class="flex w-full">
                    <div class="w-6/12 md:shrink-0 ">
                        <div class="w-full">
                            <img class="object-fill h-full w-full"
                                src="{{ Illuminate\Support\Facades\Storage::url("images/$product->avatar") }}"
                                alt="">
                        </div>
                        <div class="grid grid-cols-3 gap-4 mt-4">
                            @foreach ($product->images as $item)
                                <div>
                                    <img class="object-fill h-full"
                                        src="{{ Illuminate\Support\Facades\Storage::url('images/' . $item->path) }}"
                                        alt="">
                                </div>
                            @endforeach
                        </div>
                        <p class="mt-5 text-2xl bg-slate-300 w-fit">{{!in_array($product->stock, [-1, 0]) ? ($product->expire_at >= date('Y-m-d') ? '': 'Hết hạn sử dụng') : 'Hết hàng'}}</p>
                    </div>
                    <div class="w-6/12 ml-10">
                        <div class="w-full flex justify-between">
                            <h2 class="font-semibold text-3xl text-slate-800">{{ $product->name }}</h2>
                        </div>
                        <div class="flex justify-between border-b border-lime-600">
                            <div class="mt-5 text-lg text-slate-700 pb-10 w-11/12">
                                <div class="flex py-2 space-x-4">
                                    <img class="h-fit"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>
                                        Địa chỉ:
                                        @if ($currentUser->id == $product->owner_id ||
                                            (!empty($product->orders[0]) ? in_array($product->orders[0]->status, [0]) : false))
                                            {{ $product->address . ', ' }}
                                        @endif
                                        {{ $product->district . ', ' . $product->city }}
                                    </p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img class="h-fit"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u50.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Người đăng: {{ $product->giver->name ?? '' }}</p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img class="h-fit"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u52.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Liên hệ:
                                        @if ($currentUser->id != $product->owner_id &&
                                            (!empty($product->orders[0]) ? in_array($product->orders[0]->status, [1, 2]) : true))
                                            {{ $product->hidePhoneNumber() }}
                                        @else
                                            {{ $product->phone }}
                                        @endif
                                    </p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img class="h-fit"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u56.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Đơn vị: {{ $product->unit }}</p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img class="h-fit"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u54.png?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Trọng lượng:
                                        {{ $product->weight . $product->weight_unit . '/' . $product->unit }}
                                    </p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img class="h-fit"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u58.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Số lượng: {{ $product->quantity }}</p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img class="h-fit"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u60.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Hạn sử dụng: {{ $product->expire_at }}</p>
                                </div>
                            </div>
                            <div class="pl-2 mt-6 flex flex-col space-y-5 w-1/12">
                                <a href="#">
                                    <img class="h-fit"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/chi_ti_t_s_n_ph_m_-_ng__i_t_ng/u106.svg?pageId=04d69dba-73c1-476e-b61e-a826cf89da1e"
                                        width="30px" alt="">
                                </a>
                                @if ($currentUser->id == $product->owner_id)
                                    <a
                                        href="{{ route('web.posts.edit', ['id' => $product->id, 'subCategoryId' => $product->subCategory->id]) }}">
                                        <img class="h-fit"
                                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/chi_ti_t_s_n_ph_m_-_ng__i_t_ng/u134.svg?pageId=04d69dba-73c1-476e-b61e-a826cf89da1e"
                                            width="30px" alt="">
                                    </a>
                                    <a href="{{route('web.client.duplicate.form', ['product' => $product->id])}}">
                                        <img class="h-fit"
                                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/chi_ti_t_s_n_ph_m_-_ng__i_t_ng/u133.svg?pageId=04d69dba-73c1-476e-b61e-a826cf89da1e"
                                            width="30px" alt="">
                                    </a>
                                @else
                                    @if ($product->favourite == null)
                                        <a href="" id="add-favourite" data-product-id="{{ $product->id }}"
                                            data-user-id="{{ Auth::id() }}">
                                            <img class="h-fit"
                                                src="https://e7.pngegg.com/pngimages/789/854/png-clipart-heart-shape-symbol-heart-border-love-text.png"
                                                width="30px" alt="">
                                        </a>
                                    @else
                                        <a href="" id="remove-favourite"
                                            data-favourite-id="{{ $product->favourite->id }}">
                                            <img class="h-fit"
                                                src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u124.svg?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                                                width="30px" alt="">
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div>
                            <p class="my-4 text-2xl text-bold font-bold">Mô tả</p>
                            <span class="text-lg inline-block mb-5">{{ $product->desc }}</span>
                        </div>
                        @if ($currentUser->id != $product->owner_id &&
                            (!empty($product->orders[0]) ? $product->orders[0]->status == 2 : true))
                            <form action="{{ route('web.order.create', ['product' => $product->id]) }}"
                                method="POST" id="amount-received">
                                @csrf
                                <div class="flex space-x-1">
                                    <input
                                        class="minus is-form border border-slate-500 bg-white h-7 w-12 text-center hover:cursor-pointer"
                                        type="button" data-minus="2" value="-">
                                    <input class="input-qty h-7 w-12 text-center" type="text" readonly
                                        min="1" max="{{ $product->stock }}" name="quantity" value="1"
                                        size="1">
                                    <input
                                        class="plus is-form border border-slate-500 bg-white h-7 w-12 text-center hover:cursor-pointer"
                                        type="button" data-plus="1" value="+">
                                </div>
                            </form>
                        @endif
                        @if ($currentUser->id != $product->owner_id &&
                            (!empty($product->orders[0]) ? $product->orders[0]->status == 0 : false))
                            <div class="flex space-x-1">
                                <p class="mb-3 text-xl font-light text-balck bg">Số lượng:</p>
                                <input class="h-7 w-12 text-center" type="text" readonly min="1"
                                    name="" value="{{ $product->orders[0]->quantity }}" size="1">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex justify-center mt-5">
                    @if ($currentUser->id != $product->owner_id && (!empty($product->orders[0]) ? $product->orders[0]->status == 2 : true))
                        <button  form="amount-received" type="submit" {{in_array($product->stock, [-1,0]) ? 'disabled' : ($product->expire_at < date('Y-m-d') ? 'disabled' : '') }}
                            class=" text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-200 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2">Đăng ký nhận đồ</button>
                    @endif
                    
                    @if ($currentUser->id != $product->owner_id && (!empty($product->orders[0]) ? $product->orders[0]->status == 0 : false))
                        <button type="submit" class=" text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-400 font-medium rounded-lg text-lg px-5 py-2.5 mr-2 mb-2" data-modal-toggle="popup-modal">Hủy đăng ký</button>
                    @endif

                    @if ($currentUser->id != $product->owner_id &&
                        (!empty($product->orders[0]) ? $product->orders[0]->status == 1 : false))
                        <p class="mb-3 text-xl bg-slate-300 font-light text-balck bg">Đã nhận hàng</p>
                    @endif
                </div>
                @if ($currentUser->id == $product->owner_id)
                    <div class="text-xl mt-4 font-bold border-t pt-7 border-lime-600">Thông tin người đăng ký</div>
                    <div class="flex flex-wrap">
                        @if ($product->receivers->isNotEmpty())
                            @foreach ($product->receivers as $item)
                                <div class="basis-1/2 flex flex-wrap mt-4">
                                    <div class="basis-1/2 flex space-x-4">
                                        <img class="h-fit pl-2"
                                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/chi_ti_t_s_n_ph_m_-_ng__i_t_ng/u108.svg?pageId=04d69dba-73c1-476e-b61e-a826cf89da1e"
                                            alt="">
                                        <p>{{ $item->name }}</p>
                                    </div>
                                    <div class="basic-1/2 flex space-x-4">
                                        <img class="h-fit pl-2"
                                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/chi_ti_t_s_n_ph_m_-_ng__i_t_ng/u110.svg?pageId=04d69dba-73c1-476e-b61e-a826cf89da1e"
                                            alt="">
                                        <p>{{ $item->phone_number }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-lg mt-4">Chưa có người đăng ký</p>
                        @endif
                    </div>
                @endif

            </div>
            @php
                $now = date('Y-m-d');
            @endphp
            @if ($recommend->isNotEmpty())
                <div class="w-full mt-10">
                    <div class="flex">
                        <h2 class="font-semibold text-3xl text-lime-700 w-10/12">Đề xuất cho bạn</h2>
                        <a href="{{ route('web.client.subCategory.list', $product->subCategory->id) }}" class="flex w-2/12 place-content-end relative hover:color-orange-400">
                            <span class="font-base text-xl text-gray-700 mr-6">Xem thêm</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="absolute bottom-4 h-3 mx-2 fill-gray-700">
                                <path
                                    d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                    style="text-color: grey" />
                            </svg>
                        </a>
                    </div>
                    <div class="w-full flex border border-gray-300 rounded-md mt-5 p-5">
                        @foreach ($recommend as $item)
                            <a href="{{ route('web.client.product.detail', $item->id) }}" class="w-3/12">
                                <div class="h-36 relative mx-2">
                                    <img src="{{ Illuminate\Support\Facades\Storage::url("images/$item->avatar") }}"
                                        class="object-fill h-full w-full" alt="">

                                    @if ($item->favourite == null)
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 absolute bottom-2 right-2 fill-white" viewBox="0 0 512 512">
                                            <path
                                                d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 absolute bottom-2 right-2 fill-orange-400"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                        </svg>
                                    @endif

                                </div>
                                <h3 class="text-2xl h-10 mx-2">{{ $item->name }}</h3>
                                <div class="flex py-2 space-x-4 h-16 items-center mx-2">
                                    <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        class="w-1/12 h-fit mb-0" alt="">
                                    <p class="text-lg">{{ $item->district . ', ' . $item->city }}</p>
                                </div>
                                <div class="flex space-x-4 h-8 items-center mx-2">
                                    @if ($item->expire_at == $now)
                                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                            class="w-1/12 h-fit" alt="">
                                        <p class="text-orange-400 text-lg">
                                            {{ $item->expire_at }}
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
                </div>
            @endif
            @if ($nearExpiryFood->isNotEmpty())
                <div class="w-full mt-10">
                    <div class="flex">
                        <h2 class="font-semibold text-3xl text-lime-700 w-10/12">Giải cứu thực phẩm sắp hết hạn</h2>
                        <a href="{{ route("web.client.product.search") }}" class="flex w-2/12 place-content-end relative hover:color-orange-400">
                            @method('GET', "sort")
                            <span class="font-base text-xl text-gray-700 mr-6">Xem thêm</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="absolute bottom-4 h-3 mx-2 fill-gray-700">
                                <path
                                    d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                    style="text-color: grey" />
                            </svg>
                        </a>
                    </div>
                    <div class="w-full flex border border-gray-300 rounded-md mt-5 p-5">
                        @foreach ($nearExpiryFood as $item)
                            <a href="{{ route('web.client.product.detail', $item->id) }}" class="w-3/12">
                                <div class="h-36 relative mx-2">
                                    <img src="{{ Illuminate\Support\Facades\Storage::url("images/$item->avatar") }}"
                                        class="object-fill h-full w-full" alt="">

                                    @if ($item->favourite == null)
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 absolute bottom-2 right-2 fill-white" viewBox="0 0 512 512">
                                            <path
                                                d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 absolute bottom-2 right-2 fill-orange-400"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                        </svg>
                                    @endif
                                </div>
                                <h3 class="text-2xl h-10 mx-2">{{ $item->name }}</h3>
                                <div class="flex py-2 space-x-4 h-16 items-center mx-2">
                                    <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        class="w-1/12 h-fit mb-0" alt="">
                                    <p class="text-lg">{{ $item->district . ', ' . $item->city }}</p>
                                </div>
                                <div class="flex space-x-4 h-8 items-center mx-2">
                                    @if ($item->expire_at == $now)
                                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                            class="w-1/12 h-fit" alt="">
                                        <p class="text-orange-400 text-lg">
                                            {{ $item->expire_at }}
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
                </div>
            @endif
        </div>
        @include('layouts.banner')
    </div>

    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                    data-modal-toggle="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Hủy đăng ký?</h3>
                    <form action="{{ route('web.order.unsubscribe', ['product' => $product->id]) }}" method="POST">
                        @csrf
                        <button data-modal-toggle="popup-modal" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Có
                        </button>
                        <button data-modal-toggle="popup-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Hủy</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('msg'))
        <div class="flex justify-end sticky bottom-0">
            <div id="toast-success"
                class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow"
                role="alert">
                <div
                    class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session()->pull('msg') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif


    <script type="text/javascript">
        $(document).ready(function() {
            $('input.input-qty').each(function() {
                var $this = $(this),
                    qty = $this.parent().find('.is-form'),
                    min = Number($this.attr('min')),
                    max = Number($this.attr('max'))
                d = Number($this.attr('value'));
                $(qty).on('click', function() {
                    if ($(this).hasClass('minus')) {
                        if (d > min)
                            d += -1
                    } else if ($(this).hasClass('plus')) {
                        if (d < max)
                            d += 1
                    }
                    $this.attr('value', d)
                })
            })

            $('#toast-success').fadeOut(5000);

            $('#add-favourite').click(function(e) {
                e.preventDefault();

                var url = "{{ route('web.client.product.add-favourite') }}";
                var product_id = $(this).data('product-id');
                var user_id = $(this).data('user-id');

                $.ajax(url, {
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        user_id: user_id,
                    },
                    success: function(data) {
                        console.log('success');
                        alert('Sản phẩm đã được thêm vào danh sách yêu thích');
                        location.reload(true);
                    },
                    error: function(e) {
                        console.log('fail');
                    }
                });
            });

            $('#remove-favourite').click(function(e) {
                e.preventDefault();

                var url = "{{ route('web.client.product.remove-favourite') }}";
                var favourite_id = $(this).data('favourite-id');

                $.ajax(url, {
                    type: 'POST',
                    data: {
                        favourite_id: favourite_id,
                    },
                    success: function(data) {
                        console.log('success');
                        alert('Sản phẩm đã được gỡ khỏi danh sách yêu thích');
                        location.reload(true);
                    },
                    error: function(e) {
                        console.log('fail');
                    }
                });
            });
        });
    </script>
</x-app-layout>
