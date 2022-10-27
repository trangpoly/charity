<x-app-layout>
    <div class="container py-24 px-6 mx-auto bg-white">
        <!-- Section: Design Block -->
        <section class="mb-32 text-gray-800">
            <div class="flex flex-wrap">
                <div class="grow-0 shrink-0 basis-auto mb-6 md:mb-0 w-full md:w-6/12 px-3 lg:px-6">
                    <h2 class="text-4xl font-bold mb-6">Contact us</h2>
                    <p class="text-gray-500 mb-6 text-xl">
                        Nếu bạn gặp bất cứ vấn đề hay khó khăn gì khi sử dụng trang web hãy phản hồi cho chúng tôi biết.
                    </p>
                    <p class="text-gray-500 mb-2 text-xl">Địa Chỉ: Tầng 5, Tòa NIC, Tôn Thất Thuyết, Hoàng Mai, Hà Nội
                    </p>
                    <p class="text-gray-500 mb-2 text-xl">Số Điện Thoại: +84 999 888 666</p>
                    <p class="text-gray-500 mb-2 text-xl">Email: mohasoftware@gmail.com</p>
                </div>
                <div class="grow-0 shrink-0 basis-auto mb-12 md:mb-0 w-full md:w-6/12 px-3 lg:px-6">
                    <form method="POST" action="{{ route('web.client.saveContact') }}">
                        @csrf
                        <div class="form-group mb-6">
                            <input type="text"
                                class="form-control block
                    w-full
                    px-3
                    py-1.5
                    text-xl
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput7" placeholder="Tên Của Bạn" name="name">
                            @if ($errors->has('name'))
                                <span class="text-red-700 text-sm"> {{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-6">
                            <input type="email"
                                class="form-control block
                    w-full
                    px-3
                    py-1.5
                    text-xl
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput8" placeholder="Địa Chỉ Email" name="email">
                            @if ($errors->has('email'))
                                <span class="text-red-700 text-sm"> {{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-6">
                            <textarea
                                class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-xl
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                "
                                id="exampleFormControlTextarea13" rows="3" name="content" placeholder="Lời Nhắn..."></textarea>
                                @if ($errors->has('content'))
                                <span class="text-red-700 text-sm"> {{ $errors->first('content') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-check text-center mb-6">
                            <input type="checkbox"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                                id="exampleCheck87" checked>
                            <label class="form-check-label inline-block text-gray-800" for="exampleCheck87">Send me a
                                copy of this
                                message</label>
                        </div>
                        <button type="submit"
                            class="
                w-full
                px-6
                py-2.5
                bg-blue-600
                text-white
                font-medium
                text-xl
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-blue-700 hover:shadow-lg
                focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-blue-800 active:shadow-lg
                transition
                duration-150
                ease-in-out">Send</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
    <script>
        $(document).ready(function() {
            $('#toast-success').fadeOut(5000);
        });
    </script>
</x-app-layout>
