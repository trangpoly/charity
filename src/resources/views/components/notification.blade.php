<div class="w-1/4 text-center text-gray-500 hover:text-black">
    <button type="button" id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
        data-dropdown-placement="bottom">
        <div class="h-6 text-center relative">
            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u172.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                class="m-auto" alt="">
                @if ($notifyUnread != 0)
                    <div id="notifyUnread" class="absolute bottom-4 right-3 font-bold text-gray-600 rounded-full bg-red-500 flex items-center justify-center font-mono" style="height: 20px; width: 20px; ">{{$notifyUnread}}</div>        
                @endif
        </div>
        <p class="mt-3">Thông báo</p>
    </button>
</div>
<div id="dropdownNotification" class="hidden w-1/4 rounded {{!empty($notify->toArray()) ? 'bg-gray-100' : 'bg-lime-200'}} divide-y divide-gray-100 shadow"
    aria-labelledby="dropdownNotificationButton" data-popper-reference-hidden="" data-popper-escaped=""
    data-popper-placement="bottom"
    style="position: absolute; inset: 10px auto auto 10px; margin: 0px; transform: translate3d(0px, 15800.8px, 0px);">
    @if (!empty($notify->toArray()))
        <div class="flex py-3 px-4 h-12 items-center justify-between">
            <span class="font-bold text-xl">Tất cả thông báo</span>
            <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" data-dropdown-placement="left-start" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-100 rounded-full hover:bg-white focus:ring-4 focus:outline-none focus:ring-gray-50" type="button"> 
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
            </button>
        </div>

        <div id="dropdownDotsHorizontal" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                <li>
                    <a id="markAsRead" type="button" class="cursor-pointer block py-2 px-4 hover:bg-gray-100">Đánh dấu tất cả là đã đọc</a>
                </li>
            </ul>
        </div>

        <div id="notifyParent" class="overflow-y-auto h-[600px] divide-y divide-gray-100 dark:divide-gray-700">
            @foreach ($notify as $item)
                <a href="{{route('web.client.notify.detail', ['notify' => $item->id])}}" class="flex h-24 py-3 px-4 {{$item->read_at == null ? 'bg-lime-200' : 'bg-gray-100'}} hover:bg-gray-300">
                    <div class="relative flex-shrink-0">
                        <img class="w-11 h-11 rounded-full"
                            src="https://cdn-icons-png.flaticon.com/512/147/147144.png" alt="Jese image">
                        <div
                            class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-blue-600 rounded-full border border-white dark:border-gray-800">
                            <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                </path>
                                <path
                                    d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="pl-3 w-full">
                        <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span
                                class="font-semibold text-gray-900 dark:text-white">{{$item->actor->name}}</span>: {{$item->title}}</div>
                        <div class="text-xs text-blue-600 dark:text-blue-500">{{$item->created_at}}</div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="flex h-[100px] divide-y divide-gray-100 dark:divide-gray-700 justify-center items-center">
            <p class="text-xl text-center font-bold">Chưa có thông báo nào</p>
        </div>
    @endif
</div>

@section('script')
    <script>
        $(document).ready(function() {
            $('#dropdownNotificationButton').on('click', function(){
                $('#notifyUnread').remove();
            });

            $('#markAsRead').on('click', function(e){
                e.preventDefault();

                $.ajax({
                    type:'POST',
                    url:"{{ route('web.client.notify.markAsRead') }}",
                    data:{},
                    success:function(data){
                        $('#notifyParent').children().removeClass('bg-lime-200 bg-gray-100').addClass('bg-gray-100');;
                    }
                });
            });
        });
    </script>
@endsection