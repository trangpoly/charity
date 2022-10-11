@extends('admin.layouts.master')
@section('title', ' Products')
@section('content')
    <div class="container">
        <form action="" method="" class="w-full h-fix">
            <div class="input flex mb-5 space-x-4">
                <div class="">
                    <p class="text-black font-semibold">Product name</p>
                    <input type="text" class="h-8 border border-gray-300 px-2" name="name" placeholder="Search...">
                </div>
                <div class="">
                    <p class="text-black font-semibold">Status</p>
                    <select class="h-8 w-full border border-gray-300 px-2" name="status" id="">
                        <option value="">Please select</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </div>
                <div class="space-x-2">
                    <p class="w-full text-black font-semibold">Address</p>
                    <div class="flex space-x-1">
                        <select class="h-8 w-full border border-gray-300 px-2" name="" id="">
                            <option value="">Select province</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                        <select class="h-8 w-full border border-gray-300 px-2" name="" id="">
                            <option value="">Select district</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>
                </div>
                <div class="space-x-2">
                    <p class="w-full text-black font-semibold">Address</p>
                    <div class="flex space-x-1">
                        <select class="h-8 w-full border border-gray-300 px-2" name="" id="">
                            <option value="">Select province</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                        <select class="h-8 w-full border border-gray-300 px-2" name="" id="">
                            <option value="">Select district</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>
                </div>
                <div class="space-x-2">
                    <p class="w-full text-black font-semibold">Expiration data</p>
                    <div class="flex space-x-1">
                        <input type="date" class="h-8 border border-gray-300 px-2" name="">
                        <input type="date" class="h-8 border border-gray-300 px-2" name="">
                    </div>
                </div>
                <div class="space-x-2">
                    <p class="text-black font-semibold">Stock</p>
                    <select class="h-8 w-full border border-gray-300 px-2" name="" id="">
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
        <div class="w-full flex py-0 items-end mb-5">
            <p class="pr-8 text-black">Display item: 1~10</p>
            <form action="" method="">
                <select class="border border-gray-300 px-2 py-1" name="status" id="">
                    <option value="">10</option>
                    <option value="">50</option>
                    <option value="">100</option>
                </select>
            </form>
            <p class="px-2 text-black">items/page</p>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                            Expiration data
                        </th>
                        <th scope="col" colspan="2" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr class="bg-white border-b text-black dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="py-4 px-6 text-black">
                                {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
                            </td>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$item->name}}
                            </th>
                            <td class="py-4 px-6">
                                {{$item->category_id}}
                            </td>
                            <td class="py-4 px-6">
                                {{$item->quantity}}
                            </td>
                            <td class="py-4 px-6">
                                1111
                            </td>
                            <td class="py-4 px-6">
                                {{$item->stock}}
                            </td>
                            <td class="py-4 px-6">
                                {{$item->expiration}}
                            </td>
                            <td class="py-4 px-6 flex space-x-6">
                                <a href="#">
                                    <img width="32px" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u109.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021" alt="">
                                </a>
                                <a href="#">
                                    <img width="30px" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u110.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021" alt="">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav class="flex justify-center py-4" aria-label="Table navigation">
                <ul class="inline-flex items-center space-x-1">
                    <li>
                        <a href="#" class="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="z-10 py-2 px-3 leading-tight text-blue-600 bg-blue-50 border border-blue-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection