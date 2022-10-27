@extends('admin.layouts.master')
@section('title', 'Banner Management')
@section('content')
    <div class="container">
        <p class="text-2xl font-bold text-blue-700">Banner Setting</p>
        <div class="w-full h-screen p-4">
            <form action="{{ route('web.admin.banner.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="box-top-banner" class="relative w-1/3 mt-2 bg-white border-2 border-gray-700">
                    <div class="flex justify-center items-center">
                        <label id="label-top-banner" for="top-banner-input"
                            class="h-72 justify-center items-center w-full bg-gray-50 cursor-pointer dark:hover:bg-bray-800 hover:bg-gray-100">
                            <img id="top-banner" class="object-fill h-full w-full"
                                src="{{ $banners[0]->path == '' ? 'https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u40.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c' : asset('/storage/banners/' . $banners[0]->path) }}"
                                alt="">
                            <input type="text" value="{{ $banners[0]->id }}" name="id_banner_top" hidden>
                            <input type="text" value="{{ $banners[0]->path }}" name="path_banner_top"
                                id="path_banner_top_old" hidden>
                            <input id="top-banner-input" type="file" name="path_banner_top"
                                onchange="previewTopBanner()" class="hidden" />
                        </label>
                    </div>
                    <button id="removeTopImg"
                        class="absolute flex space-x-4 bg-red-500 rounded-full top-0 right-0 hover:bg-red-700 hover:text-white"
                        type="button" style="{{ $banners[0]->path == '' ? 'display:none' : 'display:block' }}">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                {{-- Search Bar --}}
                <div class="w-1/3 h-64 mt-2 bg-white border-2 border-gray-700">
                </div>
                <div class="relative w-1/3 mt-2 bg-white border-2 border-gray-700">
                    <div class="flex justify-center items-center">
                        <label id="label-mid-banner" for="mid-banner-input"
                            class="h-56 justify-center items-center w-full bg-gray-50 cursor-pointer dark:hover:bg-bray-800 hover:bg-gray-100">
                            <img id="mid-banner" class="object-fill h-full w-full"
                                src="{{ $banners[1]->path == '' ? 'https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u40.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c' : asset('/storage/banners/' . $banners[1]->path) }}"
                                alt="">
                            <input type="text" value="{{ $banners[1]->id }}" name="id_banner_mid" hidden>
                            <input type="text" value="{{ $banners[1]->path }}" name="path_banner_mid"
                                id="path_banner_mid_old" hidden>
                            <input id="mid-banner-input" type="file" name="path_banner_mid"
                                onchange="previewMidBanner()" class="hidden" />
                        </label>
                    </div>
                    <button id="removeMidImg" type="button"
                        style="{{ $banners[1]->path == '' ? 'display:none' : 'display:block' }}"
                        class="absolute flex space-x-4 bg-red-500 rounded-full top-0 right-0 hover:bg-red-700 hover:text-white">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="relative w-1/3 mt-2 bg-white border-2 border-gray-700">
                    <div class="flex justify-center items-center">
                        <label id="label-bot-banner" for="bot-banner-input"
                            class="h-56 justify-center items-center w-full bg-gray-50 cursor-pointer dark:hover:bg-bray-800 hover:bg-gray-100">
                            <img id="bot-banner" class="object-fill h-full w-full"
                                src="{{ $banners[2]->path == '' ? 'https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u40.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c' : asset('/storage/banners/' . $banners[2]->path) }}"
                                alt="">
                            <input type="text" value="{{ $banners[2]->id }}" name="id_banner_bot" hidden>
                            <input type="text" value="{{ $banners[2]->path }}" name="path_banner_bot"
                                id="path_banner_bot_old" hidden>
                            <input id="bot-banner-input" type="file" name="path_banner_bot"
                                onchange="previewBotBanner()" class="hidden" />
                        </label>
                    </div>
                    <button id="removeBotImg" type="button"
                        style="{{ $banners[2]->path == '' ? 'display:none' : 'display:block' }}"
                        class="absolute flex space-x-4 bg-red-500 rounded-full top-0 right-0 hover:bg-red-700 hover:text-white">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                {{-- Button Group --}}
                <div class="button-group text-center">
                    <button type="button"
                        class="focus:outline-none text-white bg-blue-600 border-gray-700 hover:bg-blue-700 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                        Back
                    </button>
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
        function previewTopBanner() {
            document.getElementById('top-banner').src = URL.createObjectURL(this.event.target.files[0]);
            $("#removeTopImg").css('display', 'block');
            $('#removeTopImg').on('click', function() {
                $("#top-banner-input").remove();
                $("#top-banner-input").append(`
                    <input id="top-banner-input" type="file" name="path_banner_top"
                    onchange="previewTopBanner()" class="hidden" />
                `);
                $("#label-top-banner").children().append(`
                    <input id="top-banner-input" type="file" name="path_banner_top"
                    onchange="previewTopBanner()" class="hidden" />
                `);
            });
        }
        function previewMidBanner() {
            document.getElementById('mid-banner').src = URL.createObjectURL(this.event.target.files[0]);
            $("#removeMidImg").css('display', 'block');
            $('#removeMidImg').on('click', function() {
                $("#mid-banner-input").remove();
                $("#mid-banner-input").append(`
                    <input id="mid-banner-input" type="file" name="path_banner_mid"
                    onchange="previewMidBanner()" class="hidden" />
                `);
                $("#label-mid-banner").children().append(`
                    <input id="mid-banner-input" type="file" name="path_banner_mid"
                    onchange="previewMidBanner()" class="hidden" />
                `);
            });
        }
        function previewBotBanner() {
            document.getElementById('bot-banner').src = URL.createObjectURL(this.event.target.files[0]);
            $("#removeBotImg").css('display', 'block');
            $('#removeBotImg').on('click', function() {
                $("#bot-banner-input").remove();
                $("#bot-banner-input").append(`
                    <input id="bot-banner-input" type="file" name="path_banner_bot"
                    onchange="previewBotBanner()" class="hidden" />
                `);
                $("#label-bot-banner").children().append(`
                    <input id="bot-banner-input" type="file" name="path_banner_bot"
                    onchange="previewBotBanner()" class="hidden" />
                `);
            });
        }
        $(document).ready(function() {
            $('#removeTopImg').on('click', function() {
                $("#top-banner").attr('src',
                    'https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u40.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c'
                );
                $("#removeTopImg").css('display', 'none');
                $("#top-banner-input").attr('value', "");
                $("#path_banner_top_old").attr('value', "");
            });
            $('#removeMidImg').on('click', function() {
                $("#mid-banner").attr('src',
                    'https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u40.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c'
                );
                $("#removeMidImg").css('display', 'none');
                $("#mid-banner-input").attr('value', "");
                $("#path_banner_mid_old").attr('value', "");
            });
            $('#removeBotImg').on('click', function() {
                $("#bot-banner").attr('src',
                    'https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u40.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c'
                );
                $("#removeBotImg").css('display', 'none');
                $("#bot-banner-input").attr('value', "");
                $("#path_banner_bot_old").attr('value', "");
            });
        });
    </script>
@endsection