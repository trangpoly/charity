<footer class="bg-lime-200 pt-5 px-10">
    <div class="flex max-w-8xl mx-auto mt-10">
        <div class="w-3/12 text-left">
            <a href="{{ route('home') }}">
                <x-application-logo />
            </a>
        </div>
        <div class="w-9/12 flex text-2xl">
            <div class="w-6/12">
                <ul class="list-none mb-0">
                    <li class="my-2">
                        <a href="#!" class="text-black hover:text-lime-600 underline">Về chúng tôi</a>
                    </li>
                    <li class="my-2">
                        <a href="#!" class="text-black hover:text-lime-600 underline">Chính sách bảo
                            mật</a>
                    </li>
                </ul>
            </div>
            <div class="w-6/12">
                <ul class="list-none mb-0">
                    <li class="my-2">
                        <a href="{{ route('web.client.formContact') }}" class="text-black hover:text-lime-600 underline">Liên Hệ</a>
                    </li>
                    <li class="my-2">
                        <a href="#!" class="text-black hover:text-lime-600 underline">Điều khoản sử
                            dụng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="max-w-8xl mx-auto py-10 text-gray-700">
        © Copyright 2022 MOHA Software. All rights reserved.
    </div>
</footer>
