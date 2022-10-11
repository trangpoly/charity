@extends('admin.layouts.master')
@section('title', ' Categories')
@section('content')
    <div class="container">
        <form action="" method="" class="w-full h-fix">
            <div class="input flex mb-5">
                <div class="w-3/12">
                    <p class="text-black font-semibold">Category name</p>
                    <input type="text" class="h-8 border border-gray-300 px-2" name="name" placeholder="Search...">
                </div>
                <div class="w-2/12">
                    <p class="text-black font-semibold">Status</p>
                    <select class="h-8 w-full border border-gray-300 px-2" name="status" id="">
                        <option value="">Please select</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </div>
            </div>

            <div class="w-full h-fit bg-yellow-200 mb-5 text-center py-2 space-x-2">
                <button type="submit" class="bg-yellow-500 text-black py-1 px-10 border border-gray-300">Search</button>
                <button type="reset" class="bg-white text-blue-500 py-1 px-10 border border-gray-300">Reset</button>
            </div>
        </form>
        <div class="flex py-0 items-end mb-5 relative">
            <p class="pr-8 text-black">Display item: 1~10</p>
            <form action="" method="">
                <select class="border border-gray-300 px-2 py-1" name="status" id="">
                    <option value="">10</option>
                    <option value="">50</option>
                    <option value="">100</option>
                </select>
            </form>
            <p class="px-2 text-black">items/page</p>
            <a href="{{ route('web.admin.categories.add') }}"
                class="flex space-x-4 px-2 py-1 bg-yellow-500 border border-gray-300 rounded-md absolute right-0">
                <p class="text-black text-sm">Create new</p>
                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u131.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                    alt="">
            </a>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Sub-Category
                        </th>
                        <th scope="col" colspan="2" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parenCategories as $parenCategory)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="py-4 px-6 text-black">
                                {{-- {{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }} --}}
                            </td>
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $parenCategory->name }}
                            </th>
                            <td class="py-4 px-6">
                                <img src="{{ Illuminate\Support\Facades\Storage::url("images/$parenCategory->image") }}"
                                    width="200px" alt="">
                            </td>
                            <td class="py-4 px-6">
                                {{ $parenCategory->status == 0 ? 'Active' : 'Deactive' }}
                            </td>
                            <td class="py-4 px-6">
                                @foreach ($parenCategory->subCategory as $item)
                                    <p>{{ $item->name }}</p>
                                @endforeach
                            </td>
                            <td class="py-4 px-6 flex space-x-6">
                                <a href="#">
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
            <nav class="flex justify-center py-4" aria-label="Table navigation">
                <ul class="inline-flex items-center space-x-1">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="z-10 py-2 px-3 leading-tight text-blue-600 bg-blue-50 border border-blue-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
