<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto py-6">
            <h2 class="font-semibold text-3xl text-gray-800">
                Tài khoản
            </h2>
        </div>
    </header>

    <div class="flex max-w-8xl mx-auto mt-10 mb-10">
        <div class="w-4/12  border border-gray-300 h-fit">
            @include('client.partials.account-function-list')
        </div>
        <div class="w-8/12 ml-10">
            <h2 class="font-semibold text-2xl text-lime-700">Danh sách sản phẩm tặng</h2>
            <div class="mt-8 flex w-full items-center text-xl text-gray-700 space-x-16">
                <div
                    class="text-gray-500 hover:font-semibold border-b-4 bg-gray-100 hover:text-gray-600 hover:border-b-4 hover:border-lime-200">

                    <a href="{{ route('web.client.giver-posts.not-registered') }}" class="">
                        Chưa được đăng kí nhận
                    </a>
                </div>
                <div
                    class="text-gray-500 hover:font-semibold border-b-4 bg-gray-100 hover:text-gray-600 hover:border-b-4 hover:border-lime-200">
                    <a href="{{ route('web.client.giver-posts') }}">
                        Đã được đăng kí nhận
                    </a>
                </div>
                <div class="font-semibold text-gray-600 border-b-4 border-lime-200">
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
            <div class="box-products w-full mt-10">
                @foreach ($productsGived as $product)
                    <div class="box-product w-full flex border border-gray-300 rounded-md p-10 mt-5"
                        style="display: none;">
                        <div class="w-6/12">
                            <img src="{{ asset('storage/images/' . $product->avatar) }}" alt="">
                        </div>
                        <div class="w-6/12 ml-10 relative">
                            <h2 class="font-semibold text-3xl text-slate-800">{{ $product->name }}</h2>
                            <div class="mt-5 text-lg text-slate-700 pb-10 border-b border-lime-600">
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
                            <div class="mt-5 relative box-infoUsers">
                                <p class="font-semibold text-2xl text-slate-700">Thông tin người đăng kí</p>
                                <div class="mt-2 text-lg">
                                    <svg class="w-6 absolute top-1 right-0" id="loadInfoUser" style="display: none"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                    </svg>
                                    <svg class="w-6 absolute top-1 right-0" id="hiddenInfoUser" style="display: none"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
                                    </svg>
                                    @foreach ($product->receivers as $item)
                                        <div class="flex mt-2 space-x-4 box-infoUser" style="display: none;">
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
                            <a href="{{ route('web.client.product.detail', $product->id) }}">
                                <img class="absolute top-0 right-0"
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_2/u66.svg?pageId=c04ce93b-70a8-47e2-8d2f-1680ee11aaa2"
                                    width="30px" alt="">
                            </a>
                            <a href="{{ route('web.posts.edit', [$product->id, $product->category_id]) }}">
                                <img class="absolute top-8 right-0"
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_2/u68.svg?pageId=c04ce93b-70a8-47e2-8d2f-1680ee11aaa2"
                                    width="30px" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".box-product").slice(0, 3).show();
            if ($(".box-product").length > 3) {
                $(".box-products").append(
                    `<a href="#" id="loadMore" class="text-blue-500 hover:text-blue-800 text-xl mt-5 float-right">Xem them...</a>`
                );
            }
            $("#loadMore").on("click", function(e) {
                e.preventDefault();
                $(".box-product:hidden").slice(0, 3).slideDown();
                if ($(".box-product:hidden").length == 0) {
                    $("#loadMore").remove();
                }
            });
        })

        $(document).ready(function() {
            $(".box-infoUser").slice(0, 2).show();

            if ($(".box-infoUser").length > 2) {
                $("#loadInfoUser").css('display', 'block');
            }

            $("#loadInfoUser").on("click", function() {
                $(".box-infoUser:hidden").slice(0, $(".box-infoUser").length).slideDown();
                if ($(".box-infoUser:hidden").length == 0) {
                    $("#loadInfoUser").css('display', 'none');
                    $("#hiddenInfoUser").css('display', 'block');
                }
            });

            $("#hiddenInfoUser").on("click", function() {
                $(".box-infoUser").slice(2, $(".box-infoUser").length).slideUp();
                $("#hiddenInfoUser").css('display', 'none');
                $("#loadInfoUser").css('display', 'block');
            });
        })
    </script>
</x-app-layout>
