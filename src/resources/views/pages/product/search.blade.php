<x-app-layout>
    <div class="flex max-w-8xl mx-auto mt-16 space-x-8 mb-10">
        <div class="w-8/12">
            <div class="flex ">
                <form id="formSearch" action="{{ route('web.client.product.filterSearch', ['id' => $id]) }}" method="GET"
                    class="space-x-4 mt-8 w-10/12">
                    @csrf
                    <label class="text-xl mt-2">Sắp xếp theo</label>
                    <select class="w-3/12 border border-gray-300" name="sort" id="sort">
                        <option value="">Select</option>
                        <option value="sap-het-han">Sắp hết hạn</option>
                        <option value="ngay-sap-het-han">Ngày hết hạn xa nhất</option>
                    </select>
                    @foreach ($subCt as $item)
                        <input type="hidden" name="subCate[]" value="{{$item}}">
                    @endforeach
                </form>
                <div>
                    {{ Session::has('search') }}
                </div>
                <div class="w-2/12 mt-8">
                    <p class="font-base text-xl mt-2 text-gray-700 ">Tổng sản phẩm:
                        {{ count($search) }} </p>
                </div>
            </div>
            <div class="w-full border rounded-xl border-gray-300 mt-4">
                <div id="faker" class="w-full flex flex-wrap rounded-md p-5 ">
                    @if (!$search->isEmpty())
                        @foreach ($search as $item)
                            <div class="w-3/12 relative p-2">
                                <a href="{{ route('web.client.product.detail', $item->id) }}">
                                    <img class="h-fit"
                                        src="{{ Illuminate\Support\Facades\Storage::url('images/' . $item->avatar) }}"
                                        style="width:250px; height:250px" alt="">
                                    <h3 class="text-2xl mt-2 h-16">{{ $item->name }}</h3>

                                    <div class="flex py-2 space-x-4 h-15">
                                        <img class="h-fit"
                                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                            width="18px" alt="">
                                        <p class="text-lg">{{ $item->district }}, {{ $item->city }}</p>
                                    </div>
                                    <div class="flex py-2 space-x-4  ">
                                        @php
                                            $now = date('Y-m-d');
                                        @endphp
                                        @if ($item->expire_at == $now)
                                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                                class="w-1/12 h-fit" alt="">
                                            <p class="text-orange-400 text-lg">
                                                {{ $item->expire_at }}
                                            </p>
                                        @elseif ($item->expire_at < $now)
                                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                                class="w-1/12 h-fit" alt="">
                                            <p class="text-orange-400 text-lg">
                                                Đã hết hạn
                                            </p>
                                        @else
                                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home__ch_a_login_/u144.svg?pageId=f1b2389f-3a56-4508-9aba-e73a9fffd1f1"
                                                class="w-1/12 h-fit" alt="">
                                            <p class="text-black text-lg">
                                                {{ $item->expire_at }}
                                            </p>
                                        @endif
                                    </div>
                                    @if (in_array($item->stock, [-1, 0]))
                                        <p class="text-red-600 text-base">Hết hàng!!!</p>
                                    @endif
                                </a>
                            </div>
                        @endforeach
                    @else
                        <h3>Không có sản phẩm mà bạn muốn tìm kiếm!!!</h3>
                    @endif
                </div>
                <div class="w-full mb-2 mr-6">
                    <p id="link-paginate">
                        {{-- {{ $search->links() }} --}}
                    </p>
                </div>
            </div>
        </div>
        <div class="w-4/12 h-fit">
            <div class="w-full border border-gray-300 h-60"></div>
            <div class="w-full border border-gray-300 h-fit mt-10">
                <form action="{{ route('web.client.product.submitSearch', $id) }}" method="GET">
                    {{-- @csrf --}}
                    <input type="hidden" name="sort" id="sortId" value="">
                    <div class="w-full flex text-xl px-2 font-semibold text-gray-800">
                        <div class="w-full flex items-center text-center py-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u36.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                class="w-2/12 p-5" alt="">
                            {{-- <p class="text-3xl">Tìm kiếm {{ $ }}</p> --}}
                        </div>
                    </div>
                    <div class="w-full flex text-lg px-5 text-gray-800 hover:bg-lime-100">
                        <div class="w-full pb-5 border-b border-lime-500">
                            <p class="w-10/12 py-5 text-2xl font-semibold">Chọn danh mục</p>
                            <div class="grid grid-cols-2 w-full">
                                @foreach ($subCategory as $subCate)
                                    <div class="space-x-4">
                                        <input class="mx-4 h-6 w-6" name="subCate[]" value="{{ $subCate->id }}"
                                            type="checkbox" id="">{{ $subCate->name }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex text-lg px-5  text-gray-800 hover:bg-lime-100">
                        <div class="w-full  border-b border-lime-500">
                            <p class="w-full text-2xl py-5 font-semibold">Chọn khu vực</p>
                            <div class="w-full pb-8">
                                <div class="w-full flex mb-5 space-x-8">
                                    <label class="w">Tỉnh thành</label>
                                    <select class="w-8/12 h-10" name="city" id="">
                                        <option value="">Select</option>
                                        <option value="Ha Noi">Hà Nội</option>
                                        <option value="Ninh Binh">Ninh Bình</option>
                                    </select>
                                </div>
                                <div class="w-full flex space-x-6">
                                    <label class="w">Quân huyện</label>
                                    <select class="w-8/12 h-10" name="district" id="">
                                        <option value="">Select</option>
                                        <option value="Cầu Giấy">Cầu Giấy</option>
                                        <option value="Hà Đông">Hà Đông</option>
                                        <option value="Kim Sơn">Kim Sơn</option>
                                        <option value="Yên Khánh">Yên Khánh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex  px-5  text-gray-800 hover:bg-lime-100">
                        <div class="w-full  border-b border-lime-500">
                            <p class="w-10/12 py-5 font-semibold text-2xl">Hạn sử dụng</p>
                            <div class="w-full pb-6 flex ">
                                <input class="mx-4 w-6/12" type="date" name="dateStart">
                                <p class="font-semibold text-2xl mt-2">~</p>
                                <input class="mx-4 w-6/12" type="date" name="dateEnd">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex text-2xl px-5  text-gray-800 hover:bg-lime-100">
                        <div class="w-full space-x-4 mt-4 mb-4">
                            <input type="checkbox" class="w-6 h-6 mx-4">Thực phẩm sắp hết hạn
                        </div>
                    </div>
                    <div class="w-full flex text-2xl px-5  text-with-800 hover:bg-lime-100">
                        <div class="w-full mt-4 mb-4 text-center">
                            <button type="submit"
                                class="rounded-md py-2 px-8 bg-yellow-600 text-white font-semibold text-2xl hover:bg-lime-500">Tìm
                                kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-full border border-gray-300 mt-10 h-32"></div>
            <div class="w-full border border-gray-300 mt-10 h-32"></div>
        </div>
        <script>
            var element = $("#faker").children();
            $("#sort").change(function() {
                let sort = $("#sort").val();
                var searchParams = new URLSearchParams(window.location.search)
                $("#formSearch").submit()
            })
        </script>
</x-app-layout>
