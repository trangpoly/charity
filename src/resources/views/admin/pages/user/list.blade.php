@extends('admin.layouts.master')
@section('title', 'User Management')
@section('content')
    <div class="container">
        <form action="" method="" class="w-full h-fix">
            <div class="input flex mb-5">
                <div class="w-3/12">
                    <p class="text-black font-semibold">User name</p>
                    <input type="text" class="h-8 border border-gray-300 px-2" name="name" id="user-search-name" placeholder="User name...">
                </div>
                <div class="w-3/12">
                    <p class="text-black font-semibold">Email</p>
                    <input type="text" class="h-8 border border-gray-300 px-2" name="name" id="user-search-email" placeholder="Email...">
                </div>
                <div class="w-3/12">
                    <p class="text-black font-semibold">Phone</p>
                    <input type="text" class="h-8 border border-gray-300 px-2" name="name" id="user-search-phone" placeholder="Phone number...">
                </div>
                <div class="w-2/12">
                    <p class="text-black font-semibold">Status</p>
                    <select class="h-8 w-full border border-gray-300 px-2" name="status" id="user-search-status">
                        <option value="">Please select</option>
                        <option value="active">Active</option>
                        <option value="unactive">Unactive</option>
                    </select>
                </div>
            </div>

            <div class=" w-full h-fit bg-yellow-200 mb-5 text-center py-2 space-x-2">
                <button type="button" id="user-search" class="bg-yellow-500 text-black py-1 px-10 border border-gray-300">Search</button>
                <button type="reset" class="bg-white text-blue-500 py-1 px-10 border border-gray-300">Reset</button>
            </div>
        </form>
        <div class="w-full flex py-0 justify-end">
            <div>
                <a type="button" href="{{route('web.admin.user.form')}}" class=" flex items-center h-10 bg-orange-400 hover:bg-orange-500 active:bg-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                    <p class="text-white mr-2">Create</p>
                    <img class="h-5" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/user_management/u133.svg?pageId=cc8a7305-72c4-47f1-a75f-9cc1324d0df1" alt="">
                </a>
            </div>
        </div>

        <div class="overflow-x-auto relative shadow-md rounded-lg p-2">
            <table id="table-users" class="pt-2 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-md text-white bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            No
                        </th>
                        <th scope="col" class="py-3 px-6">
                            User name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Email
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Phone number
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Last login datetime
                        </th>
                        <th scope="col" class="py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="py-4 px-6 text-black">
                                {{++$key}}
                            </td>
                            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$item->name}}
                            </td>
                            <td class="py-4 px-6">
                                {{$item->email}}
                            </td>
                            <td class="py-4 px-6">
                                {{$item->phone_number}}
                            </td>
                            <td class="py-4 px-6">
                                {{$item->status == 1 ? 'active' : 'unactive'}}
                            </td>
                            <td class="py-4 px-6">
                                123
                            </td>
                            <td class="py-4 px-6 flex space-x-4">
                                <a href="#">
                                    <img class="" width="32px" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u109.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021" alt="">
                                </a>
                                <a href="#">
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
            $('#table-users').DataTable({dom : 'lrtip'});

            $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                var status = $( "#user-search-status option:selected").val();
                var column = (data[4]) || 0; // use data for the age column
            
                if (
                    (status == "") ||
                    (status == column)
                ) {
                    return true;
                }
                return false;
            });

            $('#user-search').on('click', function () {
                $('#table-users')
                    .DataTable()
                    .column(1)
                    .search(
                        $('#user-search-name').val()
                    )
                    .draw();

                $('#table-users')
                    .DataTable()
                    .column(2)
                    .search(
                        $('#user-search-email').val()
                    )
                    .draw();

                $('#table-users')
                    .DataTable()
                    .column(3)
                    .search(
                        $('#user-search-phone').val()
                    )
                    .draw();
            });

            $('#toast-notify').fadeOut(5000);
        });
    </script>
@endsection
