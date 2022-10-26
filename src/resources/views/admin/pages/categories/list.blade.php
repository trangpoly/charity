@extends('admin.layouts.master')
@section('title', ' Categories')
@section('content')
    <div class="container">
        <form action="{{ route('web.admin.category.search') }}" method="POST" class="w-full h-fix">
            @csrf
            <div class="input flex mb-5">
                <div class="w-3/12">
                    <p class="text-black font-semibold">Category name</p>
                    <input type="text" id="cate-search-name" class="h-8 border border-gray-300 px-2" name="name"
                        placeholder="Search...">
                </div>
                <div class="w-2/12">
                    <p class="text-black font-semibold">Status</p>
                    <select class="h-8 w-full border border-gray-300 px-2" name="status" id="cate-search-status">
                        <option value="3">Please select</option>
                        <option value="1">Active</option>
                        <option value="2">Deactive</option>
                    </select>
                </div>
            </div>
            <div class="w-full h-fit bg-yellow-200 mb-5 text-center py-2 space-x-2">
                <button id="btn-cate-search-name" type="submit"
                    class="bg-yellow-500 text-black py-1 px-10 border border-gray-300">Search</button>
                <button type="reset" class="bg-white text-blue-500 py-1 px-10 border border-gray-300">Reset</button>
            </div>
        </form>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <a href="{{ route('web.admin.category.add') }}"
                class="z-10 flex space-x-4 px-2 py-1 bg-yellow-500 border border-gray-300 rounded-md absolute right-0">
                <p class="text-black text-sm">Create new</p>
                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u131.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                    alt="">
            </a>
            <table id="table-cate" class="pt-2 space-y-10 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-md text-white bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            No
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Category name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Category image
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Expiration Date
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Sub-Category
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="table-cate">
                    @foreach ($parentCategories as $parentCategory)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="py-4 px-6 text-black">
                                {{$loop->iteration}}
                            </td>
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $parentCategory->name }}
                            </td>
                            <td class="py-4 px-6">
                                <img src="{{ Illuminate\Support\Facades\Storage::url("images/$parentCategory->image") }}"
                                    width="200px" alt="">
                            </td>
                            <td class="py-4 px-6">
                                {{ $parentCategory->expiration_date }}
                            </td>
                            <td class="py-4 px-6">
                                @if ($parentCategory->status == 1)
                                    Active
                                @endif
                                @if ($parentCategory->status == 2)
                                    Deactive
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @foreach ($parentCategory->subCategory as $item)
                                    <p>{{ $item->name }}</p>
                                @endforeach
                            </td>
                            <td class="py-10 px-6 flex space-x-6">
                                <a href="{{ route('web.admin.category.detail', $parentCategory->id) }}">
                                    <img width="32px"
                                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u109.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                                        alt="">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#table-cate").DataTable({
                dom: 'lrtip'
            });

            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                var status = $("#cate-search-status option:selected").val();
                var column = (data[4]) || 0;
                if (
                    (status == "") ||
                    (status == column)
                ) {
                    return true;
                }
                return false;
            });
            $('#btn-cate-search-name').on('click', function() {
                $('#table-cate')
                    .DataTable()
                    .column(1)
                    .search(
                        $('#cate-search-name').val()
                    )
                    .draw();
            });
        })
    </script>
@endsection
