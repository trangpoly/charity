<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
            </script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @vite(['resources/css/admin.scss', 'resources/js/admin.js'])
    <title>@yield('title')</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
</head>
<body class="bg-gray-100">
    @if (session()->has('msg'))
        <div class="flex justify-end fixed top-0 right-0 z-40">
            <div id="toast-notify" class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow" role="alert">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-medium">{{session()->pull('msg')}}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-7 w-7" data-dismiss-target="#toast-notify" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5 mt-1 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
    @endif
    <!-- start navbar -->
    <div
        class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">
        <!-- logo -->
        <div class="flex-none w-56 flex flex-row items-center">
            <nav class="flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-gray-800 " aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-md font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="#"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Templates</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <!-- end logo -->
        <!-- navbar content toggle -->
        <!-- end navbar content toggle -->
        <!-- navbar content -->
        <div id="navbar"
            class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">
            <!-- left -->
            <div
                class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
            </div>
            <!-- end left -->
            <!-- right -->
            <div class="flex flex-row-reverse items-center">
                <!-- user -->
                <div class="dropdown relative md:static">
                    <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                        <div class="w-8 h-8 overflow-hidden rounded-full">
                            <img class="w-full h-full object-cover"
                                src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/dashboard/u26.svg?pageId=0cba15eb-7ac6-481d-a4e3-2d242946c3b9">
                        </div>
                        <div class="ml-2 capitalize flex ">
                            {{-- <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{ Auth::guard('admin')->user()->name }}</h1> --}}
                            <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
                        </div>
                    </button>
                    <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>
                    <div
                        class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">
                        <!-- item -->
                        <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-with hover:bg-black-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                            href="#">
                            <i class="fad fa-user-edit text-xs mr-1"></i>
                            Profile
                        </a>
                        <hr>
                        <!-- item -->
                        <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                            href="{{ route('web.admin.logout') }}">
                            <i class="fad fa-user-times text-xs mr-1"></i>
                            Log out
                        </a>
                        <!-- end item -->
                    </div>
                </div>
            </div>
            <!-- end right -->
        </div>
        <!-- end navbar content -->
    </div>
    <!-- end navbar -->
    <!-- strat wrapper -->
    <div class="h-screen flex flex-row flex-wrap">
        <!-- start sidebar -->
        <div id="sideBar"
            class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">

            <!-- sidebar content -->
            <p class="w-full pt-5 px-5 uppercase text-xs text-gray-600 mb-4  tracking-wider">Menu</p>

            <div class="flex flex-col">
                <a href="#"
                    class="p-5 capitalize font-medium text-md hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                    Dashboard
                    <img style="float: right" width="27px"
                        src="https://cdn0.iconfinder.com/data/icons/octicons/1024/dashboard-512.png" alt="">
                </a>
                <a href="#"
                    class="p-5 capitalize font-medium text-md hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                    Account Management
                    <img style="float: right" width="19px"
                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/dashboard/u12.svg?pageId=0cba15eb-7ac6-481d-a4e3-2d242946c3b9"
                        alt="">
                </a>
                <a href="{{ route('web.admin.category.list') }}"
                    class="p-5 capitalize font-medium text-md hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                    Category Management
                    <img style="float: right" width="20px"
                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/dashboard/u27.svg?pageId=0cba15eb-7ac6-481d-a4e3-2d242946c3b9"
                        alt="">
                </a>
                <a href="{{route('web.admin.user.list')}}"
                    class="p-5 capitalize font-medium text-md hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                    User Management
                    <img style="float: right" width="20px"
                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/dashboard/u16.svg?pageId=0cba15eb-7ac6-481d-a4e3-2d242946c3b9"
                        alt="">
                </a>
                <a href="{{route('web.admin.product.list')}}"
                    class="p-5 capitalize font-medium text-md hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                    Product Management
                    <img style="float: right" width="19px" height="18"
                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/dashboard/u28.svg?pageId=0cba15eb-7ac6-481d-a4e3-2d242946c3b9"
                        alt="">
                </a>
                <a href="{{route('web.admin.order.list')}}"
                    class="p-5 capitalize font-medium text-md hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                    Order Management
                    <img style="float: right" width="22px" height="18"
                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/dashboard/u15.png?pageId=0cba15eb-7ac6-481d-a4e3-2d242946c3b9"
                        alt="">
                </a>
                <a href="#"
                    class="p-5 capitalize font-medium text-md hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                    Banner Management
                    <img style="float: right"
                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/dashboard/u18.svg?pageId=0cba15eb-7ac6-481d-a4e3-2d242946c3b9"
                        alt="">
                </a>
                <a href="#"
                    class="p-5 capitalize font-medium text-md hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                    Log Out
                    <img style="float: right"
                        src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/dashboard/u30.svg?pageId=0cba15eb-7ac6-481d-a4e3-2d242946c3b9"
                        alt="">
                </a>
            </div>
            <!-- end sidebar content -->
        </div>
        <!-- end sidbar -->
        <!-- strat content -->
        <div class="bg-black h-24"></div>
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            @yield('content')
        </div>
        <!-- end content -->
    </div>
    <!-- end wrapper -->
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @yield('script')
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>
</html>
