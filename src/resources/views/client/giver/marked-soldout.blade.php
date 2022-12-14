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
                <div
                    class="text-gray-500 hover:font-semibold border-b-4 bg-gray-100 hover:text-gray-600 hover:border-b-4 hover:border-lime-200">
                    <a href="{{ route('web.client.giver-posts.gived') }}">
                        Đã tặng
                    </a>
                </div>
                <div class="font-semibold text-gray-600 border-b-4 border-lime-200">
                    <a href="{{ route('web.client.giver-posts.marked-soldout') }}">
                        Đã đánh dấu hết hàng
                    </a>
                </div>
            </div>
            <div class="box-products w-full mt-10">
                @foreach ($productsMarkedSolOut as $product)
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
                            <a href="{{ route('web.client.product.detail', $product->id) }}">
                                <img class="absolute top-0 right-0"
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_t_ng_2/u66.svg?pageId=c04ce93b-70a8-47e2-8d2f-1680ee11aaa2"
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
    </script>
</x-app-layout>
