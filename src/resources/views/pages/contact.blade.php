<x-app-layout>
    <div class="container py-24 px-6 mx-auto bg-white">
        <!-- Section: Design Block -->
        <section class="mb-32 text-gray-800">
            <div class="flex flex-wrap">
                @if (session()->has('msg'))
                    <div class="flex justify-end fixed top-0 right-0 z-40">
                        <div id="toast-notify"
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
                            <div class="ml-3 text-sm text-black font-medium">{{ session()->pull('msg') }}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-7 w-7"
                                data-dismiss-target="#toast-notify" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5 mt-1 ml-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="grow-0 shrink-0 basis-auto mb-6 md:mb-0 w-full md:w-6/12 px-3 lg:px-6">
                    <h2 class="text-4xl font-bold mb-6">Liên hệ với chúng tôi</h2>
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
                                    ease-in-out">Gửi</button>
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
