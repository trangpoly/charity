<x-app-layout>
    <div class="w-[800px] bg-white border-gray-500 shadow m-auto content-center my-6">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8 md: mx-4">
            <h1
                class="text-xl text-center font-bold font-[Merriweather] leading-tight tracking-tight text-gray-800 md:text-2xl">
                Đăng ký tài khoản
            </h1>
            <form class="space-y-4 md:space-y-6" action="{{ route('web.register.auth') }}" method="POST">
                @csrf

                <div>
                    <label for="phone_number" class="block mb-2 text-lg font-medium text-gray-900">
                        Vui lòng nhập số điện thoại để đăng ký tài khoản
                    </label>
                    <input type="text" name="phone_number" id="phone_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-gray-600 block w-full p-2.5"
                        placeholder="Vui lòng nhập số điện thoại" required="">
                    @foreach ($errors->get('phone_number') as $message)
                        <p class="text-red-600 text-md mt-3">{{ $message }}</p>
                    @endforeach
                </div>
                <div class="w-full text-center relative">
                    <button type="submit"
                        class="bg-orange-400 m-auto hover:bg-orange-500 text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center">
                        ĐĂNG KÝ
                    </button>

                    <a href="{{ route('web.login.show') }}" class="text-lgs font-light text-blue-700 underline absolute right-0">
                        Quay về đăng nhập
                    </a>
                </div>
                <div class="space-y-4">
                    <div class="w-full rounded-sm flex bg-[#3b5999]">
                        <img class="h-8 inline m-2"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/register/u24.png?pageId=6a949787-1cf5-4350-aa5d-cf3beb363a0c"
                            alt="">
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center">
                            Đăng ký bằng tài khoản Facebook
                        </button>
                    </div>
                    <div class="w-full rounded-sm flex  bg-white border border-black">
                        <img class="h-8 inline m-2"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/register/u25.png?pageId=6a949787-1cf5-4350-aa5d-cf3beb363a0c"
                            alt="">
                        <button type="submit"
                            class="w-full text-gray-700 bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center">
                            Đăng ký bằng tài khoản Google
                        </button>
                    </div>
                </div>
                <p class="text-center">
                    Đăng ký tài khoản nghĩa là bạn đồng ý với
                    <a href="#" class="underline text-blue-700">chính sách bảo mật </a>
                    và
                    <a href="#" class="underline text-blue-700">điều khoản sử dụng</a>
                    của trang web
                </p>
            </form>
        </div>
    </div>
</x-app-layout>
