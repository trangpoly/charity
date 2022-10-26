@extends('admin.layouts.master')
@section('title', 'Order Management')
@section('content')
    <div class="container">
        <form action="" method="" class="w-full h-fix">
            <div class="input flex mb-5">
                <div class="w-3/12">
                    <p class="text-black font-semibold">Product name</p>
                    <input type="text" class="h-8 border border-gray-300 px-2" name="name" id="product-search" placeholder="Search...">
                </div>
                <div class="w-3/12">
                    <p class="text-black font-semibold">Category</p>
                    <select class="h-8 w-2/3 border border-gray-300 px-2" name="status" id="category-search">
                        <option value="">Please select</option>
                        @foreach ($categories as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-3/12">
                    <p class="text-black font-semibold">Giver's name</p>
                    <input type="text" class="h-8 border border-gray-300 px-2" name="name" id="giver-search" placeholder="Search...">
                </div>
                <div class="w-3/12">
                    <p class="text-black font-semibold">Recipient's name</p>
                    <input type="text" class="h-8 border border-gray-300 px-2" name="name" id="recipient-search" placeholder="Search...">
                </div>
            </div>

            <div class=" w-full h-fit bg-yellow-200 mb-5 text-center py-2 space-x-2">
                <button type="button" id="order-search" class="bg-yellow-500 text-black py-1 px-10 border border-gray-300">Search</button>
                <button type="reset" class="bg-white text-blue-500 py-1 px-10 border border-gray-300">Reset</button>
            </div>
        </form>

        <div class="overflow-x-auto relative shadow-md rounded-lg p-2">
            <table id="table-orders" class="pt-2 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-md text-white bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            No
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Product name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Category name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Quantity
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Giver's name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Recipient's name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Received date
                        </th>
                        <th scope="col" class="py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="py-4 px-6 text-black">
                                {{++$key}}
                            </td>
                            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$item->product->name ?? ''}}
                            </td>
                            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$item->subCategory->name ?? ''}}
                            </td>
                            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$item->quantity ?? ''}}
                            </td>
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{$item->giver->name ?? ''}}
                            </td>
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{$item->receiver->name ?? ''}}
                            </td>
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{$item->status == 0 ? 'registered' : ($item->status == 1 ? 'received' : 'cancelled')}}
                            </td>
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{$item->received_date ?? ''}}
                            </td>
                            <td class="py-4 px-6 flex space-x-4">
                                <a href="{{route('web.admin.order.edit', ['id' => $item->id])}}">
                                    <img class="" width="32px" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u109.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021" alt="">
                                </a>
                                <a onclick= "return confirm('Are you sure you want to deactivate this user?')" href="{{route('web.admin.order.delete', ['id' =>$item->id])}}" class="cursor-pointer">
                                    <img width="30px" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u110.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021" alt="">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table-orders').DataTable({dom : 'lrtip'});

            $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                var category = $( "#category-search option:selected").val();
                var column = (data[2]) || 0; // use data for the age column
            
                if (
                    (category == "") ||
                    (category == column)
                ) {
                    return true;
                }
                return false;
            });

            $('#order-search').on('click', function () {
                $('#table-orders')
                    .DataTable()
                    .column(1)
                    .search(
                        $('#product-search').val()
                    )
                    .draw();

                $('#table-orders')
                    .DataTable()
                    .column(4)
                    .search(
                        $('#giver-search').val()
                    )
                    .draw();

                $('#table-orders')
                    .DataTable()
                    .column(5)
                    .search(
                        $('#recipient-search').val()
                    )
                    .draw();
            });

            $('#toast-notify').fadeOut(5000);
        });
    </script>
@endsection
