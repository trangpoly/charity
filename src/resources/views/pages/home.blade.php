<x-app-layout>
    {{-- <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert"
        id="login-success-alert">
        <strong class="font-bold">Đăng nhập thành công!</strong>
        <span class="block sm:inline">Chào mừng bạn đến với website từ thiện của chúng tôi.</span>
        <button class="absolute top-0 bottom-0 right-0 px-4 py-3" id="close-alert">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Close</title>
                <path
                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </button>
    </div> --}}
    @include('layouts.slide')
    <div class="flex max-w-8xl mx-auto mt-16 space-x-8 mb-10">
        <div class="w-8/12">
            <div class="w-full">
                <div class="flex">
                    <h2 class="font-semibold text-3xl text-lime-700 w-10/12">Nông sản</h2>
                    <a href="" class="font-base text-2xl text-gray-700 w-2/12 hover:text-orange-400">Xem thêm
                        ></a>
                </div>
                <div class="w-full flex border border-gray-300 rounded-md space-x-10 mt-5 p-5">
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="18px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u123.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="w-full mt-10">
                <div class="flex">
                    <h2 class="font-semibold text-3xl text-lime-700 w-10/12">Đồ ăn trong ngày</h2>
                    <a href="" class="font-base text-2xl text-gray-700 w-2/12 hover:text-orange-400">Xem thêm
                        ></a>
                </div>
                <div class="w-full flex border border-gray-300 rounded-md space-x-10 mt-5 p-5">
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u123.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="w-full mt-10">
                <div class="flex">
                    <h2 class="font-semibold text-3xl text-lime-700 w-10/12">Đồ dùng sinh hoạt</h2>
                    <a href="" class="font-base text-2xl text-gray-700 w-2/12 hover:text-orange-400">Xem thêm
                        ></a>
                </div>
                <div class="w-full flex border border-gray-300 rounded-md space-x-10 mt-5 p-5">
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                    <div class="w-3/12 relative">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                        <h3 class="text-2xl mt-2">Ổi sạch Di Trạch</h3>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                width="15px" alt="">
                            <p class="text-lg">Hoài Đức, Hà Nội</p>
                        </div>
                        <div class="flex py-2 space-x-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                width="15px" alt="">
                            <p class="text-orange-400 text-lg">29/09/2022</p>
                        </div>
                        <img class="absolute top-40 right-2" width="25px"
                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u123.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="w-4/12 h-fit">
            <div class="w-full border border-gray-300 h-60"></div>
            <div class="w-full border border-gray-300 h-fit mt-10">
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
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u69.png?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                            class="w-3/12 p-5" alt="">
                        <p class="w-10/12 py-10">Đồ ăn trong ngày</p>
                    </div>
                </div>
                <div class="w-full flex text-2xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                    <div class="w-full flex border-b border-lime-500">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u70.png?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                            class="w-3/12 p-5" alt="">
                        <p class="w-10/12 py-10">Thực phẩm đóng gói</p>
                    </div>
                </div>
                <div class="w-full flex text-2xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
                    <div class="w-full flex">
                        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u71.png?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                            class="w-3/12 p-5" alt="">
                        <p class="w-10/12 py-10">Đồ dùng sinh hoạt</p>
                    </div>
                </div>
            </div>
            <div class="w-full border border-gray-300 mt-10 h-32"></div>
            <div class="w-full border border-gray-300 mt-10 h-32"></div>
        </div>
    </div>
    <div class="w-full justify-center my-10 flex space-x-4">
        <p class="text-3xl hover:text-lime-700">Trở về đầu trang</p>
        <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u29.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
            width="40px" alt="">
    </div>
</x-app-layout>

{{-- @section('script')
<script type="text/javascript">
    $(document).ready(function() {
      $('#close-alert').click(function() {
        $('#login-success-alert').remove();
      });
    });
</script>
@endsection --}}
