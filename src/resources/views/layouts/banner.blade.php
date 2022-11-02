<div class="w-4/12 h-fit">
        @if ($banners[0]->path !== '')
            <div class="w-full border border-gray-300 h-72">
                <img id="top-banner" class="object-fill h-full w-full"
                    src="{{ asset('storage/banners/' . $banners[0]->path) }}" alt="">
            </div>
        @else
            <div class="w-full border border-gray-300 h-72">
                <img id="top-banner" class="object-fill h-full w-full"
                    src="https://scontent.fhan5-8.fna.fbcdn.net/v/t1.15752-9/311022761_426481996345482_418573754572453898_n.png?_nc_cat=106&ccb=1-7&_nc_sid=ae9488&_nc_ohc=ADIb973_k_EAX9sd3om&_nc_ht=scontent.fhan5-8.fna&oh=03_AdQ-jWHdqKA2dViblQUBv65XJVmGYUMIqJuIAtI7LArJ9g&oe=63897D81" alt="">
            </div>
        @endif
    <div class="w-full border border-gray-300 h-fit mt-10">
        <div class="w-full flex text-xl px-2 font-semibold text-gray-800">
            <div class="w-full flex items-center text-center py-2 px-4 space-x-4">
                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/home_____login_/u36.svg?pageId=5737196c-eb35-4ecc-99fa-f985d8ba40d5"
                    class="w-2/12 p-3" alt="">
                <p class="text-2xl">Tìm kiếm theo danh mục</p>
            </div>
        </div>
        @foreach ($categories as $category)
            @if (!$category->parent_id)
                <a href="{{ route('web.client.category.list', $category->id) }}"
                    class="w-full flex text-lg px-1 font-semibold text-gray-800 hover:bg-lime-100">
                    <div class="w-full flex border-b border-lime-500">
                        <div class="image w-3/12 py-5 px-4">
                            <img src="{{ Illuminate\Support\Facades\Storage::url("images/$category->image") }}"
                                class="object-fill" alt="">
                        </div>

                        <p class="w-10/12 py-8 text-gray-9
                        00">
                            {{ $category->name }}</p>
                    </div>
                </a>
            @endif
        @endforeach

    </div>
    @if ($banners[1]->path !== '')
        <div class="w-full border border-gray-300 mt-10 h-52">
            <img id="top-banner" class="object-fill h-full w-full"
                src="{{ asset('storage/banners/' . $banners[1]->path) }}" alt="">
        </div>
    @else
    <div class="w-full border border-gray-300 mt-10 h-52">
        <img id="top-banner" class="object-fill h-full w-full"
            src="https://scontent.fhan5-9.fna.fbcdn.net/v/t1.15752-9/310035386_660055872134246_4333915890457524466_n.png?_nc_cat=109&ccb=1-7&_nc_sid=ae9488&_nc_ohc=ND_KlGz5dIgAX-BtszS&_nc_ht=scontent.fhan5-9.fna&oh=03_AdQEU0WFEbMrTiPKu2YSDpo3W_QCtVSajRltgPkbpxm0Ow&oe=6389984B" alt="">
    </div>
    @endif
    @if ($banners[2]->path !== '')
        <div class="w-full border border-gray-300 mt-10 h-52">
            <img id="top-banner" class="object-fill h-full w-full"
                src="{{ asset('storage/banners/' . $banners[2]->path) }}" alt="">
        </div>
    @else
        <div class="w-full border border-gray-300 mt-10 h-52">
            <img id="top-banner" class="object-fill h-full w-full"
                src="https://scontent.fhan5-11.fna.fbcdn.net/v/t1.15752-9/312914303_650559186602113_2420267589155946055_n.png?_nc_cat=100&ccb=1-7&_nc_sid=ae9488&_nc_ohc=tYlUsLXNrH8AX-79ggy&_nc_ht=scontent.fhan5-11.fna&oh=03_AdSxM0SEQDA_GbSLZWVIyjz8GzuHARzwjO_4z_YbH9otOw&oe=6389997B" alt="">
        </div>
    @endif
</div>
