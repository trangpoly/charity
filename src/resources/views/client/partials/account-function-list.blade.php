<a href="{{ route('web.client.giver-posts') }}"
    class="w-full flex text-xl px-5 font-semibold text-gray-800
    @if (url()->current() == route('web.client.giver-posts')) bg-lime-100 @endif hover:bg-lime-100">
    <div class="w-full flex  border-b border-lime-500">
        <p class="w-11/12 py-10">Danh sách sản phẩm tặng</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-lime-500" viewBox="0 0 320 512">
            <path
                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
        </svg>
    </div>
</a>
<a href="{{ route('web.client.registered') }}"
    class="w-full flex text-xl px-5 font-semibold text-gray-800
    @if (url()->current() == route('web.client.registered')) bg-lime-100 @endif hover:bg-lime-100">
    <div class="w-full flex  border-b border-lime-500">
        <p class="w-11/12 py-10">Danh sách sản phẩm nhận</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-lime-500" viewBox="0 0 320 512">
            <path
                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
        </svg>
    </div>
</a>
<a href="{{ route('web.client.favourite-list') }}"
    class="w-full flex text-xl px-5 font-semibold text-gray-800
    @if (url()->current() == route('web.client.favourite-list')) bg-lime-100 @endif hover:bg-lime-100">
    <div class="w-full flex  border-b border-lime-500">
        <p class="w-11/12 py-10">Danh sách yêu thích</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-lime-500" viewBox="0 0 320 512">
            <path
                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
        </svg>
    </div>
</a>
<a type="button" class="cursor-pointer w-full flex text-xl px-5 font-semibold text-gray-800 hover:bg-lime-100" data-modal-toggle="popup-modal">
    <div class="w-full flex  border-b border-lime-500">
        <p class="w-11/12 py-10">Hủy tài khoản</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-lime-500" viewBox="0 0 320 512">
            <path
                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
        </svg>
    </div>
</a>
<a href="{{ route('web.logout') }}"
    class="w-full flex text-xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
    <div class="w-full flex">
        <p class="w-11/12 py-10">Đăng xuất</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-lime-500" viewBox="0 0 320 512">
            <path
                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
        </svg>
    </div>
</a>

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Bạn có chắc muốn hủy tài khoản?</h3>
                <form action="{{route('web.client.user.deactivate')}}" method="GET">
                @csrf
                    <button data-modal-toggle="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Có
                    </button>
                    <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>
