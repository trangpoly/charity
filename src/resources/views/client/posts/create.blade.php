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
                            <a href="{{ route('web.posts.create-form', ['id' => $category->id]) }}" class="">{{ $category->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('layouts.banner')
    </div>
</x-app-layout>
