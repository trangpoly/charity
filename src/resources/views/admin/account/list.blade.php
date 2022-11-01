@extends('admin.layouts.master')
@section('title', ' Accounts')
@section('content')
    <div class="container ml-8 mt-5 shadow-xl">
        <form action="" method="" class="w-full h-fix">
            <div class="input flex mb-5 space-x-4">
                <div class="">
                    <p class="text-black font-semibold">Account name</p>
                    <input type="text" class="h-8 border text-sm text-gray-700 border-gray-400 px-2"
                        id="accounts-search-account" name="account" placeholder="Search...">
                </div>
                <div class="">
                    <p class="text-black font-semibold">Name</p>
                    <input type="text" class="h-8 border text-sm text-gray-700 border-gray-400 px-2"
                        id="accounts-search-name" name="name" placeholder="Search...">
                </div>
                <div class="">
                    <p class="text-black font-semibold">Email</p>
                    <input type="text" class="h-8 border text-sm text-gray-700 border-gray-400 px-2"
                        id="accounts-search-email" name="name" placeholder="Search...">
                </div>
                <div class="">
                    <p class="text-black font-semibold">Status</p>
                    <select class="h-8 text-gray-600 text-sm w-full bg-white border border-gray-400 px-2"
                        id="accounts-search-status" name="category">
                        <option value="">Please select</option>
                        <option value="Active">Active</option>
                        <option value="Deactive">Deactive</option>
                    </select>
                </div>
            </div>
            <div class="w-full h-fit bg-yellow-200 mb-5 text-center py-2 space-x-2">
                <button type="button" id="accounts-search"
                    class="bg-yellow-500 text-black py-1 px-10 border border-gray-300">Search</button>
                <button type="reset" class="bg-white text-blue-500 py-1 px-10 border border-gray-300">Reset</button>
            </div>
        </form>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-2">
            <a href="{{ route('web.admin.account.create') }}"
                class="z-10 flex space-x-4 px-2 mr-2 py-1 bg-yellow-500 border border-gray-300 rounded-md absolute right-0">
                <p class="text-black text-sm">Create new</p>
                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u131.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                    alt="">
            </a>
            <table id="table-accounts" class="w-full pt-2 text-lg text-left text-gray-500 dark:text-gray-400">
                <thead class="text-md text-white bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            No
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Account name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Email
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Role
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $item)
                        <tr
                            class="bg-white border-b text-black dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="py-4 px-6 text-black">
                                {{$loop->iteration}}
                            </td>
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->account }}
                            </td>
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $item->email }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $item->role }}
                            </td>
                            <td class="py-4 px-6">
                                @if ($item->status == 0)
                                    Active
                                @else
                                    Deactive
                                @endif
                            </td>
                            <td class="py-4 px-6 flex space-x-6">
                                <a href="{{ route('web.admin.account.update', $item->id) }}">
                                    <img width="32px"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u109.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                                        alt="">
                                </a>
                                <a href="{{ route('web.admin.account.delete', $item->id) }}"
                                    onclick="return confirm('Xác nhận xóa ?')">
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
            $('#table-accounts').DataTable({
                dom: 'lrtip'
            });
            $('#accounts-search').on('click', function() {
                $('#table-accounts')
                    .DataTable()
                    .column(2)
                    .search(
                        $('#accounts-search-name').val()
                    )
                    .draw();
            });
            $('#accounts-search').on('click', function() {
                $('#table-accounts')
                    .DataTable()
                    .column(1)
                    .search(
                        $('#accounts-search-account').val()
                    )
                    .draw();
            });
            $('#accounts-search').on('click', function() {
                $('#table-accounts')
                    .DataTable()
                    .column(5)
                    .search(
                        $('#accounts-search-status option:selected').val()
                    )
                    .draw();
            });
            $('#accounts-search').on('click', function() {
                $('#table-accounts')
                    .DataTable()
                    .column(3)
                    .search(
                        $('#accounts-search-email').val()
                    )
                    .draw();
            });
            $('#toast-notify').fadeOut(5000);
            $('#toast-danger').fadeOut(5000);
        });
    </script>
@endsection
