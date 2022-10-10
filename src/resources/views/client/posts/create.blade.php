<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto py-6">
            <h2 class="font-semibold text-3xl text-gray-800">
                Đăng Bài
            </h2>
        </div>
    </header>
    <div class="flex max-w-8xl mx-auto mt-16 space-x-8 mb-10">
        <div class="flex w-8/12 bg-white rounded-lg border border-gray-700">
            <div class="w-full">
                <p class="w-full text-2xl p-4 m-3">Vui lòng chọn danh mục sản phẩm muốn đăng.</p>
                <div class="grid gap-6 grid-cols-2 p-4 m-3">
                    @foreach($categories as $category)
                    <div class="relative w-full">
                        <img class="h-[80px] inline absolute" src="{{ $category->image }}" alt="">
                        <div class="bg-[#abd19e] w-8/12 h-[80px] ml-24 py-5 text-center text-2xl font-bold font-[Merriweather] text-white border rounded">
                            <a href="" class="">{{ $category->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-4/12 h-fit">
            <div class="bg-white w-full border border-gray-700 h-60"></div>
            <div class="bg-white w-full border border-gray-700 h-fit mt-10">
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
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/%C4%91%C4%83ng_b%C3%A0i_1/u35.png?pageId=ea4d73f6-8706-4b27-ab47-9214ed88ac69"
                            class="w-3/12 p-5" alt="">
                        <p class="w-10/12 py-10">Đồ ăn trong ngày</p>
                    </div>
                </div>
                <div class="w-full flex text-2xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                    <div class="w-full flex border-b border-lime-500">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/%C4%91%C4%83ng_b%C3%A0i_1/u36.png?pageId=ea4d73f6-8706-4b27-ab47-9214ed88ac69"
                            class="w-3/12 p-5" alt="">
                        <p class="w-10/12 py-10">Thực phẩm đóng gói</p>
                    </div>
                </div>
                <div class="w-full flex text-2xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                    <div class="w-full flex">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/%C4%91%C4%83ng_b%C3%A0i_1/u37.png?pageId=ea4d73f6-8706-4b27-ab47-9214ed88ac69"
                            class="w-3/12 p-5" alt="">
                        <p class="w-10/12 py-10">Đồ dùng sinh hoạt</p>
                    </div>
                </div>
            </div>
            <div class="bg-white w-full border border-gray-700 mt-10 h-32"></div>
            <div class="bg-white w-full border border-gray-700 mt-10 h-32"></div>
        </div>
    </div>
</x-app-layout>
