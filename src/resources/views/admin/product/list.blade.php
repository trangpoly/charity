@extends('admin.layouts.master')
@section('title', ' Products')
@section('content')
    <div class="container">
        <form action="" method="" class="w-full h-fix">
            <div class="input flex mb-5 space-x-4">
                <div class="">
                    <p class="text-black font-semibold">Product name</p>
                    <input type="text" class="h-8 border text-sm text-gray-700 border-gray-400 px-2"
                        id="products-search-name" name="name" placeholder="Search...">
                </div>
                <div class="">
                    <p class="text-black font-semibold">Category</p>
                    <select class="h-8 text-gray-600 text-sm w-full bg-white border border-gray-300 px-2"
                        id="products-search-category" name="category">
                        <option value="">Please select</option>
                        @foreach ($subCategory->subCategory->category->subCategory as $fake)
                            <option value="{{ $fake->name }}">{{ $fake->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-x-6">
                    <p class="w-full ml-6 text-black font-semibold">Expiration data</p>
                    <div class="flex space-x-1">
                        <input type="date" class="h-8 border text-gray-600 text-sm border-gray-300 px-2" id="min"
                            name="">
                        <input type="date" class="h-8 border text-gray-600 text-sm border-gray-300 px-2" id="max"
                            name="">
                    </div>
                </div>
                <div class="space-x-3">
                    <p class=" text-black ml-4 font-semibold">Stock</p>
                    <input class="h-8 w-full text-gray-700 text-sm bg-white border border-gray-300 px-2" name=""
                        id="products-search-stock">
                </div>
            </div>
            <div class="w-full h-fit bg-yellow-200 mb-5 text-center py-2 space-x-2">
                <button type="button" id="products-search"
                    class="bg-yellow-500 text-black py-1 px-10 border border-gray-300">Search</button>
                <button type="reset" class="bg-white text-blue-500 py-1 px-10 border border-gray-300">Reset</button>
            </div>
        </form>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table id="table-products" class="w-full pt-2 text-lg text-left text-gray-500 dark:text-gray-400">
                <thead class="text-md text-white bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            No
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Product name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Category
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Quantity
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Reserved quantity
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Stock
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Avatar
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Expiration data
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr
                            class="bg-white border-b text-black dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="py-4 px-6 text-black">
                                #
                            </td>
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $item->subCategory->category->name }}
                                <br>
                                <p class="text-gray-800 text-base">{{ $item->subCategory->name }}</p>
                            </td>
                            <td class="py-4 px-6">
                                {{ $item->quantity }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $item->orders->sum('quantity') }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $item->quantity - $item->orders->sum('quantity') }}
                            </td>
                            <td class="py-4 px-6">
                                <img src="{{ Illuminate\Support\Facades\Storage::url("images/products/$item->avatar") }}"
                                    width="100px" alt="">
                            </td>
                            <td class="py-4 px-6">
                                {{ $item->expire_at }}
                            </td>
                            <td class="py-4 px-6 flex space-x-6">
                                <a href="{{ route('web.admin.product.update', $item->id) }}">
                                    <img width="32px"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u109.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                                        alt="">
                                </a>
                                <a href="#">
                                    <img width="30px"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u110.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                                        alt="">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-products').DataTable({
                dom: 'lrtip'
            });
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {

                    var min = $('#min').val();
                    var max = $('#max').val();
                    var createdAt = data[7] || 0;
                    if (
                        (min == "" || max == "") ||
                        (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
                    ) {
                        return true;
                    }
                    return false;
                }
            );
            $('#products-search').on('click', function() {
                $('#table-products')
                    .DataTable()
                    .column(1)
                    .search(
                        $('#products-search-name').val()
                    )
                    .draw();
            });
            $('#products-search').on('click', function() {
                $('#table-products')
                    .DataTable()
                    .column(2)
                    .search(
                        $('#products-search-category option:selected').val()
                    )
                    .draw();
            });
            $('#products-search').on('click', function() {
                $('#table-products')
                    .DataTable()
                    .column(5)
                    .search(
                        $('#products-search-stock').val()
                    )
                    .draw();
            });
        });
    </script>
@endsection
