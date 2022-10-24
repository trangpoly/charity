<x-app-layout>
    <div class="flex max-w-8xl mx-auto mt-16 space-x-8 mb-10">
        <div class="w-8/12">
            <div class="flex">
                <a href="#"
                    class="font-semibold text-2xl text-lime-700 w-10/12">{{ $products[0]->subCategory->name }}</a>
            </div>
            <div class="flex ">
                <div class="space-x-4 mt-8 w-10/12">
                    <label class="text-xl mt-2">Sap xep theo</label>
                    <select class="w-2/12 border border-gray-300" name="expire_date" id="expire_at">
                        <option value="desc">Sap het han</option>
                        <option value="asc">Ngay het han xa nhat</option>
                    </select>
                </div>
                <div class="w-2/12 mt-8">
                    <p id="count" class="font-base text-xl mt-2 text-gray-700 ">Tong san pham:
                        {{ count($products) }} </p>
                </div>
            </div>
            <div class="w-full border rounded-xl border-gray-300 mt-4">
                <div id="faker" class="w-full flex flex-wrap rounded-md p-5 ">
                    @foreach ($products as $item)
                        <div class="w-3/12 relative p-2">
                            <img class="h-fit"
                                src="{{ Illuminate\Support\Facades\Storage::url('images/products/' .$item->images[0]->path)}}"
                                width="250px"
                                alt="">
                            <h3 class="text-2xl mt-2 h-16">{{ $item->name }}</h3>
                            @if (in_array($item->stock, [-1, 0]))
                                <p>Het hang !!!</p>
                            @endif
                            <div class="flex py-2 space-x-4 h-28">
                                <img class="h-fit"
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="18px" alt="">
                                <p class="text-lg">{{ $item->address }}</p>
                            </div>
                            <div class="flex py-2 space-x-4  ">
                                <img class="h-fit"
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                    width="15px" alt="">
                                <p class="text-orange-400 text-lg">{{ $item->expire_at }}</p>
                            </div>
                            <img class="absolute top-40 right-2" width="25px"
                                src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                alt="">
                        </div>
                    @endforeach
                </div>
                <div class="w-full mb-2 mr-6">
                    <p class="">
                        {{ $products->links() }}
                    </p>
                </div>
            </div>
        </div>
        <div class="w-4/12 h-fit">
            <div class="w-full border border-gray-300 h-60"></div>
            <div class="w-full border border-gray-300 h-fit mt-10">
                <form action="{{ route('web.client.product.submitSearch') }}" method="POST">
                    @csrf
                    <div class="w-full flex text-xl px-2 font-semibold text-gray-800">
                        <div class="w-full flex items-center text-center py-4">
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u36.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                class="w-2/12 p-5" alt="">
                            <p class="text-3xl">Tìm kiếm {{ $products[0]->subCategory->category->name }}</p>
                        </div>
                    </div>
                    <div class="w-full flex text-lg px-5 text-gray-800 hover:bg-lime-100">
                        <div class="w-full pb-5 border-b border-lime-500">
                            <p class="w-10/12 py-5 text-2xl font-semibold">Chon danh muc</p>
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
                            <p class="w-full text-2xl py-5 font-semibold">Chon khu vuc</p>
                            <div class="w-full pb-8">
                                <div class="w-full flex mb-5 space-x-8">
                                    <label class="w">Tinh thanh</label>
                                    <select class="w-8/12 h-10" name="city" id="">
                                        <option value="">Select</option>
                                        <option value="Ha Noi">Ha Noi</option>
                                        <option value="Ninh Binh">Ninh Binh</option>

                                    </select>
                                </div>
                                <div class="w-full flex space-x-6">
                                    <label class="w">Quan huyen</label>
                                    <select class="w-8/12 h-10" name="district" id="">
                                        <option value="">Select</option>
                                        <option value="Cau Giay">Cau Giay</option>
                                        <option value="Ha Dong">Ha Dong</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex  px-5  text-gray-800 hover:bg-lime-100">
                        <div class="w-full  border-b border-lime-500">
                            <p class="w-10/12 py-5 font-semibold text-2xl">Han su dung</p>
                            <div class="w-full pb-6 flex ">
                                <input class="mx-4 w-6/12" type="date" name="dateStart">
                                <p class="font-semibold text-2xl mt-2">~</p>
                                <input class="mx-4 w-6/12" type="date" name="dateEnd">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex text-2xl px-5  text-gray-800 hover:bg-lime-100">
                        <div class="w-full space-x-4 mt-4 mb-4">
                            <input type="checkbox" class="w-6 h-6 mx-4">Thuc pham sap het han
                        </div>
                    </div>
                    <div class="w-full flex text-2xl px-5  text-with-800 hover:bg-lime-100">
                        <div class="w-full mt-4 mb-4 text-center">
                            <button type="submit"
                                class="rounded-md py-2 px-8 bg-yellow-600 text-white font-semibold text-2xl hover:bg-lime-500">Tim
                                kiem</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-full border border-gray-300 mt-10 h-32"></div>
            <div class="w-full border border-gray-300 mt-10 h-32"></div>
        </div>
    </div>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var element = $("#faker").children();
            $(document).ready(function() {
                $("#expire_at").change(function() {
                    var expire_at = $("#expire_at").val();
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('web.client.product.filter', $products[0]->subCategory->id) }}",
                        data: {
                            expire_at: expire_at,
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#faker').children().remove();
                            // $("#count").remove();
                            // $("#count").innerHTML(
                            //     `Tong san pham: ` + dlength);
                            $.each(data, function(key, value) {
                                $("#faker").prepend(`
                                <div class="w-3/12 relative p-2">
                                    <img class="h-fit"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u31.jpg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                        alt="">
                                    <h3 class="text-2xl mt-2 h-16">${ value.name }</h3>
                                    <div class="flex py-2 space-x-4 h-28">
                                        <img class="h-fit"
                                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                            width="18px" alt="">
                                        <p class="text-lg">${ value.address }</p>
                                    </div>
                                    <div class="flex py-2 space-x-4  ">
                                        <img class="h-fit"
                                            src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u137.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                            width="15px" alt="">
                                        <p class="text-orange-400 text-lg">${ value.expire_at }</p>
                                    </div>
                                    <img class="absolute top-40 right-2" width="25px"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u121.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                                        alt="">
                                    </div>
                                </div>
                                `)
                            })
                        }
                    });
                });
            });
        </script>
</x-app-layout>
