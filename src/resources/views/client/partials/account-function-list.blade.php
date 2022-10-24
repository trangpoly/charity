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
<a class="w-full flex text-xl px-5 font-semibold text-gray-800 hover:bg-lime-100">
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
