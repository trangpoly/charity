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
            <div class="w-full m-4">
                <form action="" method="POST">
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Danh mục sản phẩm con
                        </label>
                        <select
                            class="form-select appearance-none
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Chọn danh mục con cho sản phẩm">
                            <option value="" selected disabled hidden>Chọn danh mục con cho sản phẩm</option>
                            <option value="1">Táo</option>
                            <option value="2">Bưởi</option>
                            <option value="3">Chuối</option>
                            <option value="4">Lê</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Tên sản phẩm
                        </label>
                        <input type="text"
                            class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1" placeholder="" />
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Mô tả sản phẩm
                        </label>
                        <textarea rows="4" name="message" id="message" placeholder=""
                            class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Hình ảnh sản phẩm
                        </label>
                        <input
                            class="block w-full text-sm text-gray-400 bg-white rounded border border-gray-300 cursor-pointer focus:outline-none "
                            id="multiple_files" type="file" multiple="">
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Đơn vị
                        </label>
                        <input type="text"
                            class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1" placeholder="" />
                    </div>
                    <div class="mb-5 flex">
                        <label for="" class="mb-3 block text-base font-medium text-[#07074D]">
                            Trọng lượng / đơn vị
                        </label>
                        <input type="number" min="1"
                            class="
                            form-control
                            block
                            w-[156px]
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            ml-12
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1" placeholder="" />
                        <select
                            class="form-select appearance-none
                                w-[80px]
                                ml-4
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Chọn danh mục con cho sản phẩm">
                            <option value="1">G</option>
                            <option value="2">KG</option>
                            <option value="3">Quả</option>
                        </select>
                    </div>
                    <div class="mb-5 flex flex-cols-2">
                        <label for="" class="mb-3 block text-base font-medium text-[#07074D]">
                            Địa chỉ
                        </label>
                        <select
                            class="form-select appearance-none
                                w-[350px]
                                ml-32
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Chọn danh mục con cho sản phẩm">
                            <option value="" selected disabled hidden>Chọn tỉnh thành</option>
                            <option value="1">Hà Nội</option>
                            <option value="2">Hồ Chí Minh</option>
                            <option value="3">Đà Nẵng</option>
                        </select>
                        <select
                            class="form-select appearance-none
                                w-[240px]
                                ml-4
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Chọn danh mục con cho sản phẩm">
                            <option value="" selected disabled hidden>Chọn quận huyện</option>
                            <option value="1">Hoàng Mai</option>
                            <option value="2">Cầu Giấy</option>
                            <option value="3">Thanh Xuân</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <input type="text"
                            class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1" placeholder="Nhập địa chỉ chi tiết" />
                    </div>
                    <div class="mb-5">
                        <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">
                            Số điện thoại liên hệ
                        </label>
                        <input type="number"
                            class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1" placeholder="" />
                    </div>
                    <div class="text-center">
                        <button
                            class="hover:shadow-form rounded-md bg-[#ffaa00] py-3 px-8 text-lg font-semibold text-white outline-none">
                            ĐĂNG BÀI
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-4/12 h-fit">
            <div class="w-full border border-gray-700 h-60"></div>
            <div class="w-full border border-gray-700 h-fit mt-10">
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
            <div class="w-full border border-gray-700 mt-10 h-32"></div>
            <div class="w-full border border-gray-700 mt-10 h-32"></div>
        </div>
    </div>
</x-app-layout>
