<x-app-layout>
    <div class="w-[800px] bg-white border-gray-500 shadow m-auto content-center my-6">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1
                class="text-xl text-center font-bold font-[Merriweather] leading-tight tracking-tight text-gray-800 md:text-2xl">
                Đăng ký tài khoản
            </h1>
            <form class="space-y-4 md:space-y-6" action="{{ route('charity.register.verify.check-otp') }}" method="POST">
                @csrf

                <div>
                    <label for="otp" class="block mb-2 text-lg font-medium text-gray-900">
                        Vui lòng nhập mã OTP đã được gửi vào số điện thoại
                    </label>
                    <input type="text" name="otp" id="otp"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-gray-600 block w-full p-2.5"
                        placeholder="Vui nhập mã OTP" required="">
                    {{-- @foreach ($errors->get('phone_number') as $message)
                        <p class="bg-red-600 text-white text-sm mt-3 rounded-sm">{{ $message }}</p>
                    @endforeach --}}
                </div>
                <div class="flex space-x-4">
                    <label for="otp" class="block mb-2 text-lg font-medium text-gray-900">
                        Mã OTP còn hiệu lực trong <span class="text-orange-500">60</span> giây
                    </label>
                    <a href="#" class="text-blue-500 underline text-lg">Gửi lại mã</a>
                </div>
                <div class="w-full text-center relative">
                    <button type="submit"
                        class="bg-orange-400 m-auto hover:bg-orange-500 text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center">
                        ĐĂNG KÝ
                    </button>
                    <a href="#" class="text-lg font-light text-blue-700 underline absolute right-0">
                        Quay về đăng nhập
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
