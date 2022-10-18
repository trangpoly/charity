<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto py-6">
            <h2 class="font-semibold text-3xl text-gray-800">
                Tài khoản
            </h2>
        </div>
    </header>

    <div class="flex max-w-8xl mx-auto mt-10">
        <div class="w-4/12  border border-gray-300 h-fit">
            <a href="{{ route('web.client.giver-posts') }}"
                class="w-full flex text-xl px-5 font-semibold text-gray-800 bg-lime-100">
                <div class="w-full flex  border-b border-lime-500">
                    <p class="w-11/12 py-10">Danh sách sản phẩm tặng</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-lime-500" viewBox="0 0 320 512">
                        <path
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                    </svg>
                </div>
            </a>
            <div class="w-full flex text-xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                <div class="w-full flex  border-b border-lime-500">
                    <p class="w-11/12 py-10">Danh sách sản phẩm nhận</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-lime-500" viewBox="0 0 320 512">
                        <path
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                    </svg>
                </div>
            </div>
            <div class="w-full flex text-xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                <div class="w-full flex  border-b border-lime-500">
                    <p class="w-11/12 py-10">Danh sách yêu thích</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-lime-500" viewBox="0 0 320 512">
                        <path
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                    </svg>
                </div>
            </div>
            <div class="w-full flex text-xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                <div class="w-full flex  border-b border-lime-500">
                    <p class="w-11/12 py-10">Hủy tài khoản</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-lime-500" viewBox="0 0 320 512">
                        <path
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                    </svg>
                </div>
            </div>
            <div class="w-full flex text-xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                <div class="w-full flex">
                    <p class="w-11/12 py-10">Đăng xuất</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-lime-500" viewBox="0 0 320 512">
                        <path
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="w-8/12 ml-10">
            <h2 class="font-semibold text-2xl text-lime-700">Danh sách sản phẩm tặng</h2>
            <div class="mt-8 flex w-full items-center text-xl text-gray-700 space-x-16">
                <div
                    class="text-gray-500 hover:font-semibold border-b-4 bg-gray-100 hover:text-gray-600 hover:border-b-4 hover:border-lime-200">

                    <a href="{{ route('web.client.giver-posts.not-registered') }}">
                        Chưa được đăng kí nhận
                    </a>
                </div>
                <div class="font-semibold text-gray-600 border-b-4 border-lime-200">
                    <a href="{{ route('web.client.giver-posts') }}" class="">
                        Đã được đăng kí nhận
                    </a>
                </div>

                <div
                    class="text-gray-500 hover:font-semibold border-b-4 bg-gray-100 hover:text-gray-600 hover:border-b-4 hover:border-lime-200">
                    <a href="{{ route('web.client.giver-posts.gived') }}">
                        Đã tặng
                    </a>
                </div>
                <div
                    class="text-gray-500 hover:font-semibold border-b-4 bg-gray-100 hover:text-gray-600 hover:border-b-4 hover:border-lime-200">
                    <a href="{{ route('web.client.giver-posts.marked-soldout') }}">
                        Đã đánh dấu hết hàng
                    </a>
                </div>
            </div>
            <div class="w-full mt-10">
                @foreach ($productsRegistered as $product)
                    <div class="w-full flex border border-gray-300 rounded-md p-10">
                        <div class="w-6/12">
                            <img src="{{ asset('storage/images/' . $product->avatar) }}" alt="">
                        </div>
                        <div class="w-6/12 ml-10 relative">
                            <h2 class="font-semibold text-3xl text-slate-800">{{ $product->name }}</h2>
                            <div class="mt-5 text-lg text-slate-700 pb-10 border-b border-lime-600">
                                <div class="flex py-2 space-x-4">
                                    <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Địa chỉ: {{ $product->city . ', ' . $product->district }}</p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u50.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Người đăng: {{ $product->giver->name }}</p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u52.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Liên hệ: {{ $product->giver->phone }}</p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u56.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Đơn vị: {{ $product->unit }}</p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u54.png?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Trọng lượng: {{ $product->weight . ' ' . $product->weight_unit }}</p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u58.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Số lượng: {{ $product->quantity }}</p>
                                </div>
                                <div class="flex py-2 space-x-4">
                                    <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u60.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                        width="25px" alt="">
                                    <p>Hạn sử dụng: {{ $product->expire_at }}</p>
                                </div>
                            </div>

                            <div class="mt-5">
                                <p class="font-semibold text-2xl text-slate-700">Thông tin người đăng kí</p>
                                <div class="mt-2 text-lg">
                                    @foreach ($product->receivers as $item)
                                        <div class="flex mt-2 space-x-4">
                                            <div class="w-1/2 flex space-x-2">
                                                <div class="w-1/4">
                                                   <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_1/u54.svg?pageId=8827addf-dd14-4b0e-975e-eb3de1aee1bf"
                                                    width="30px" alt=""> 
                                                </div>
                                                <p class="w-3/4">{{ $item->name }}</p>
                                            </div>
                                            <div class="w-1/2 flex space-x-2">
                                                <div class="w-1/4">
                                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_1/u56.svg?pageId=8827addf-dd14-4b0e-975e-eb3de1aee1bf"
                                                    width="30px" alt="">
                                                </div>
                                                <p class="w-3/4">{{ $item->phone_number }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <img class="absolute top-0 right-0"
                                src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_2/u66.svg?pageId=c04ce93b-70a8-47e2-8d2f-1680ee11aaa2"
                                width="30px" alt="">
                            <a href="">
                                <img class="absolute top-8 right-0"
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_2/u68.svg?pageId=c04ce93b-70a8-47e2-8d2f-1680ee11aaa2"
                                    width="30px" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="w-full flex border border-gray-300 rounded-md p-10 mt-10">
                    <div class="w-6/12">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u41.jpg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                            alt="">
                    </div>
                    <div class="w-6/12 ml-10">
                        <h2 class="font-semibold text-3xl text-slate-800">Ổi sạch Di Trạch</h2>
                        <div class="mt-5 text-lg text-slate-700 pb-10 border-b border-lime-600">
                            <div class="flex py-2 space-x-4">
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Địa chỉ: Hoài Đức</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u50.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Người đăng: Thảo Bún</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u52.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Liên hệ: 0123456789</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u56.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Đơn vị: Túi</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u54.png?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Trọng lượng: 1kg/túi</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u58.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Số lượng: 5</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u60.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Hạn sử dụng: 29/09/2022</p>
                            </div>
                        </div>
                        <div class="mt-5">
                            <p class="font-semibold text-2xl text-slate-700">Thông tin người đăng kí</p>
                            <div class="mt-2 text-lg">
                                <div class="flex mt-2">
                                   <div class="w-1/2 flex space-x-4">
                                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_1/u54.svg?pageId=8827addf-dd14-4b0e-975e-eb3de1aee1bf"
                                        width="25px" alt="">
                                        <p class="w-1/2">Thảo Bún</p>
                                    </div>
                                    <div class="w-1/2 flex space-x-4">
                                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_1/u56.svg?pageId=8827addf-dd14-4b0e-975e-eb3de1aee1bf"
                                        width="25px" alt="">
                                        <p class="w-1/2">0123456789</p>
                                    </div>
                                </div>
                                <div class="flex mt-2">
                                    <div class="w-1/2 flex space-x-4">
                                         <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_1/u54.svg?pageId=8827addf-dd14-4b0e-975e-eb3de1aee1bf"
                                         width="25px" alt="">
                                         <p class="w-1/2">Thảo Bún</p>
                                     </div>
                                     <div class="w-1/2 flex space-x-4">
                                         <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_1/u56.svg?pageId=8827addf-dd14-4b0e-975e-eb3de1aee1bf"
                                         width="25px" alt="">
                                         <p class="w-1/2">0123456789</p>
                                     </div>
                                 </div>

                            </div>

                        </div>

                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
