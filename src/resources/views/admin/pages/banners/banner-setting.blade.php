@extends('admin.layouts.master')
@section('title', 'Banner Management')
@section('content')
    <div class="container">
        <p class="text-2xl font-bold text-blue-700">Banner Setting</p>
        <div class="w-full h-screen p-4">
            <form action="{{ route('web.admin.banner.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Top Banner --}}
                <div class="relative w-1/3 h-fit mt-2 bg-white border-2 border-gray-700">
                    <div class="flex justify-center items-center">
                        <label id="label-top-banner" for="top-banner-input"
                            class="flex flex-col justify-center items-center w-full h-auto bg-gray-50 cursor-pointer dark:hover:bg-bray-800 hover:bg-gray-100">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6 top-banner-alert">
                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to
                                        upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            </div>
                            <div class="top-img-parent">
                                <img id="top-banner" class="" src="{{ !$banners->isEmpty() ? asset('storage/images/' . $banners[0]->path) : '' }}" alt="">
                                <input id="top-banner-input" type="file" name="image[]" value="{{ @$banners[0]->path }}" class="hidden"
                                    onchange="topImgLoaded()" />
                            </div>
                        </label>
                    </div>
                    <div
                        class="absolute flex space-x-4 bg-red-500 rounded-full top-0 right-0 hover:bg-red-700 hover:text-white">
                        <button id="removeTopImg" type="button"  onclick="removeTopImg()">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                {{-- Search Bar --}}
                <div class="w-1/3 h-64 mt-2 bg-white border-2 border-gray-700">
                </div>
                {{-- Mid Banner --}}
                <div class="relative w-1/3 h-fit mt-2 bg-white border-2 border-gray-700">
                    <div class="flex justify-center items-center">
                        <label id="label-mid-banner" for="mid-banner-input"
                            class="flex flex-col justify-center items-center w-full h-auto bg-gray-50 cursor-pointer dark:hover:bg-bray-800 hover:bg-gray-100">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6 mid-banner-alert">
                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                    <span class="font-semibold">Click toupload</span>
                                    or drag and drop
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            </div>
                            <img id="mid-banner" class="" src="{{ !$banners->isEmpty() ? asset('storage/images/' . $banners[1]->path) : '' }}" alt="">
                            <input id="mid-banner-input" type="file" name="image[]" value="{{ @$banners[1]->path }}" class="hidden"
                                onchange="midImgLoaded()" />
                        </label>
                    </div>
                    <div
                        class="absolute flex space-x-4 bg-red-500 rounded-full top-0 right-0 hover:bg-red-700 hover:text-white">
                        <button id="removeMidImg" type="button" onclick="removeMidImg()">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                {{-- Bot Banner --}}
                <div class="relative w-1/3 h-fit mt-2 bg-white border-2 border-gray-700">
                    <div class="flex justify-center items-center">
                        <label id="label-bot-banner" for="bot-banner-input"
                            class="flex flex-col justify-center items-center w-full h-auto bg-gray-50 cursor-pointer dark:hover:bg-bray-800 hover:bg-gray-100">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6 bot-banner-alert">
                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to
                                        upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            </div>
                            <img id="bot-banner" class="banner-img" src="{{ !$banners->isEmpty() ? asset('storage/images/' . $banners[2]->path) : '' }}" alt="">
                            <input id="bot-banner-input" type="file" name="image[]" value="{{ @$banners[2]->path }}" class="hidden"
                                onchange="botImgLoaded()" />
                        </label>
                    </div>
                    <div
                        class="absolute flex space-x-4 bg-red-500 rounded-full top-0 right-0 hover:bg-red-700 hover:text-white">
                        <button id="removeBotImg" type="button" onclick="removeBotImg()">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                {{-- Button Group --}}
                <div class="button-group text-center">
                    <a href="#" type="button"
                        class="focus:outline-none text-white bg-blue-600 border-gray-700 hover:bg-blue-700 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                        Back
                    </a>
                    <button type="submit"
                        class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function topImgLoaded() {
            document.getElementById('top-banner').src = URL.createObjectURL(event.target.files[0]);
        }

        function midImgLoaded() {
            document.getElementById('mid-banner').src = URL.createObjectURL(event.target.files[0]);
        }

        function botImgLoaded() {
            document.getElementById('bot-banner').src = URL.createObjectURL(event.target.files[0]);
        }

        $(document).ready(function() {
            $('#removeTopImg').on('click', function() {
                if ($('#top-banner').attr('src') != "") {
                    $('#label-top-banner').append(
                        `<div class="flex flex-col justify-center items-center pt-5 pb-6 top-banner-alert">
                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-semibold">Click toupload</span>
                                or drag and drop
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>`
                    );

                    $('#top-banner').attr('src', '');
                    $('#top-banner-input').val('');
                }
            });

            $('#removeMidImg').on('click', function() {
                if ($('#mid-banner').attr('src') != "") {
                    $('#label-mid-banner').append(
                        `<div class="flex flex-col justify-center items-center pt-5 pb-6 mid-banner-alert">
                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-semibold">Click toupload</span>
                                or drag and drop
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>`
                    );

                    $('#mid-banner').attr('src', '');
                    $('#mid-banner-input').val('');
                }
            });

            $('#removeBotImg').on('click', function() {
                if ($('#bot-banner').attr('src') != "") {
                    $('#label-bot-banner').append(
                        `<div class="flex flex-col justify-center items-center pt-5 pb-6 bot-banner-alert">
                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-semibold">Click toupload</span>
                                or drag and drop
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>`
                    );

                    $('#bot-banner').attr('src', '');
                    $('#bot-banner-input').val('');
                }
            });

            $('#top-banner').on('load', function() {
                $('.top-banner-alert').remove();
            });

            if ($('#top-banner').attr('src') != "") {
                $('.top-banner-alert').remove();
            }

            $('#mid-banner').on('load', function() {
                $('.mid-banner-alert').remove();
            });

            if ($('#mid-banner').attr('src') != "") {
                $('.mid-banner-alert').remove();
            }

            $('#bot-banner').on('load', function() {
                $('.bot-banner-alert').remove();
            });

            if ($('#bot-banner').attr('src') != "") {
                $('.bot-banner-alert').remove();
            }
        });
    </script>
@endsection
