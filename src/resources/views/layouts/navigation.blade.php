<nav x-data="{ open: false }" class="bg-white border-b-2 border-gray-200">
    <!-- Primary Navigation Menu -->
    <div class="flex max-w-8xl mx-auto h-24 items-center">
        <!-- Logo -->
        <div class="w-4/12 items-center">
            <a href="{{ route('home') }}">
                <x-application-logo class="block h-10 max-w-fit" />
            </a>
        </div>
        <!-- Search -->
        <form class="flex lg:w-4/12 sm:w-6/12 bg-white bg-clip-padding border-2 border-solid border-gray-300 ">
            <div class="form-group w-11/12">
                <input type="text"
                    class="form-control
                block
                w-full
                px-3
                h-10
                py-1.5
                text-base
                text-gray-300
                transition
                ease-in-out
                m-0
                border-none
                focus:text-gray-700 focus:bg-white"
                    id="search" placeholder="Vui lòng nhập từ khóa tìm kiếm">
            </div>
            <div class="w-1/12 my-auto">
                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/input_otp__login_/u5.svg?pageId=cb3eaa6f-36ec-4b13-8994-f53fdbe69b29"
                    width="20px" height="20px" alt="">
            </div>

        </form>
        <!-- Menu -->
        <div class="lg:flex w-4/12 ml-10 text-center items-center text-base text-gray-700 sm:hidden">
            <div class="w-1/4">
                <a href="">
                    <div class="h-6">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u6.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            class="m-auto" alt="">
                    </div>
                    <p class="mt-3">Trang chủ</p>
                </a>
            </div>
            <div class="w-1/4 text-gray-500 hover:text-black">
                <a href="">
                    <div class="h-6">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u9.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            class="m-auto" alt="">
                    </div>
                    <p class="mt-3">Đăng bài</p>
                </a>
            </div>
            <div class="w-1/4 text-gray-500 hover:text-black">
                <a href="">
                    <div class="h-6">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u172.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            class="m-auto" alt="">
                    </div>
                    <p class="mt-3">Thông báo</p>
                </a>
            </div>
            <div class="w-1/4 text-gray-500 hover:text-black">
                <a href="{{ route('web.admin.receivedList') }}">
                    <div class="h-6">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u170.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            class="m-auto" alt="">
                    </div>
                    <p class="mt-3">Tài khoản</p>
                </a>
            </div>
        </div>
        <!-- Settings Dropdown -->
        <div class="lg:hidden sm:w-3/12">
            <button class="w-full justify-items-center" type="button" data-drawer-target="drawer-contact"
                data-drawer-show="drawer-contact" aria-controls="drawer-contact">
                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u8.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                    height="30px" class="m-auto" alt="">
            </button>

        </div>
        <!-- drawer component -->
        <div id="drawer-contact"
            class="fixed w-11/12 z-40 h-screen p-4 overflow-y-auto bg-white left-0 top-0 bg-lime-800 pt-10 lg:hidden"
            tabindex="-1" aria-labelledby="drawer-contact-label" aria-hidden="true">
            <button type="button" data-drawer-dismiss="drawer-contact" aria-controls="drawer-contact"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <form class="flex w-11/12 m-auto bg-white bg-clip-padding border-2 border-solid border-gray-300 ">
                <div class="form-group w-11/12">
                    <input type="text"
                        class="form-control
                    block
                    w-full
                    px-3
                    h-12
                    py-1.5
                    text-base
                    text-gray-300
                    transition
                    ease-in-out
                    m-0
                    border-none
                    focus:text-gray-700 focus:bg-white"
                        id="search" placeholder="Vui lòng nhập từ khóa tìm kiếm">
                </div>
                <div class="w-1/12 my-auto">
                    <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/input_otp__login_/u5.svg?pageId=cb3eaa6f-36ec-4b13-8994-f53fdbe69b29"
                        width="20px" height="20px" alt="">
                </div>

            </form>
            <div class="w-11/12 m-auto mt-10 text-xl text-gray-300 font-normal">
                <div class="h-16">
                    <a href="" class="flex border-b border-gray-400 space-x-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8" viewBox="0 0 576 512">
                            <path class="fill-gray-300"
                                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c.2 35.5-28.5 64.3-64 64.3H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24zM352 224c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64zm-96 96c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H256z" />
                        </svg>
                        <span class="mt-3">Trang chủ</span>
                    </a>
                </div>
                <div class="h-16">
                    <a href="" class="flex border-b border-gray-400 space-x-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8" viewBox="0 0 512 512">
                            <path class="fill-gray-200"
                                d="M456 32h-304C121.1 32 96 57.13 96 88v320c0 13.22-10.77 24-24 24S48 421.2 48 408V112c0-13.25-10.75-24-24-24S0 98.75 0 112v296C0 447.7 32.3 480 72 480h352c48.53 0 88-39.47 88-88v-304C512 57.13 486.9 32 456 32zM464 392c0 22.06-17.94 40-40 40H139.9C142.5 424.5 144 416.4 144 408v-320c0-4.406 3.594-8 8-8h304c4.406 0 8 3.594 8 8V392zM264 272h-64C186.8 272 176 282.8 176 296S186.8 320 200 320h64C277.3 320 288 309.3 288 296S277.3 272 264 272zM408 272h-64C330.8 272 320 282.8 320 296S330.8 320 344 320h64c13.25 0 24-10.75 24-24S421.3 272 408 272zM264 352h-64c-13.25 0-24 10.75-24 24s10.75 24 24 24h64c13.25 0 24-10.75 24-24S277.3 352 264 352zM408 352h-64C330.8 352 320 362.8 320 376s10.75 24 24 24h64c13.25 0 24-10.75 24-24S421.3 352 408 352zM400 112h-192c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h192c17.67 0 32-14.33 32-32v-64C432 126.3 417.7 112 400 112z" />
                        </svg>
                        <span class="mt-3">Đăng bài</span>
                    </a>
                </div>
                <div class="h-16">
                    <a href="" class="flex border-b border-gray-400 space-x-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8" viewBox="0 0 448 512">
                            <path class="fill-gray-200"
                                d="M256 32V49.88C328.5 61.39 384 124.2 384 200V233.4C384 278.8 399.5 322.9 427.8 358.4L442.7 377C448.5 384.2 449.6 394.1 445.6 402.4C441.6 410.7 433.2 416 424 416H24C14.77 416 6.365 410.7 2.369 402.4C-1.628 394.1-.504 384.2 5.26 377L20.17 358.4C48.54 322.9 64 278.8 64 233.4V200C64 124.2 119.5 61.39 192 49.88V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32V32zM216 96C158.6 96 112 142.6 112 200V233.4C112 281.3 98.12 328 72.31 368H375.7C349.9 328 336 281.3 336 233.4V200C336 142.6 289.4 96 232 96H216zM288 448C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288z" />
                        </svg>
                        <span class="mt-3">Thông báo</span>
                    </a>
                </div>
                <div class="h-16">
                    <a href="" class="flex border-b border-gray-400 space-x-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8" viewBox="0 0 448 512">
                            <path class="fill-gray-200"
                                d="M272 304h-96C78.8 304 0 382.8 0 480c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32C448 382.8 369.2 304 272 304zM48.99 464C56.89 400.9 110.8 352 176 352h96c65.16 0 119.1 48.95 127 112H48.99zM224 256c70.69 0 128-57.31 128-128c0-70.69-57.31-128-128-128S96 57.31 96 128C96 198.7 153.3 256 224 256zM224 48c44.11 0 80 35.89 80 80c0 44.11-35.89 80-80 80S144 172.1 144 128C144 83.89 179.9 48 224 48z" />
                        </svg>
                        <span class="mt-3">Tài khoản</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
