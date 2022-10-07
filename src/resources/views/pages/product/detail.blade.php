<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-3xl text-gray-800">
            {{ __('Chi tiết sản phẩm') }}
        </h2> --}}
    </x-slot>
    
    <nav class="flex mx-auto max-w-7xl my-7" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
            <a href="#" class="inline-flex text-xl items-center font-medium text-green-600 hover:text-green-400 dark:text-gray-400 dark:hover:text-white active:text-green-500 underline underline-offset-1">
            {{-- <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg> --}}
            Nông sản
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <span class="ml-1 text-xl font-medium text-slate-500 md:ml-2 dark:text-gray-400 underline underline-offset-1">{{$product->name}}</span>
            </div>
        </li>
        </ol>
    </nav>
    
    <div class="flex flex-wrap max-w-7xl lg:space-x-12 mx-auto mb-10">
        <div class="lg:w-8/12 w-full border border-slate-400 rounded-md p-7">
            <div class="flex w-full border-b border-lime-600">
                <div class="w-6/12 md:shrink-0 ">
                    <img src="https://plus.unsplash.com/premium_photo-1663100792050-04772fc1eb0a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=938&q=80" alt="">
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        <div>
                            <img src="https://plus.unsplash.com/premium_photo-1663100792050-04772fc1eb0a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=938&q=80" alt="">
                        </div>
                        <div>
                            <img src="https://plus.unsplash.com/premium_photo-1663100792050-04772fc1eb0a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=938&q=80" alt="">
                        </div>
                        <div>
                            <img src="https://plus.unsplash.com/premium_photo-1663100792050-04772fc1eb0a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=938&q=80" alt="">
                        </div>
                        <div>
                            <img src="https://plus.unsplash.com/premium_photo-1663100792050-04772fc1eb0a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=938&q=80" alt="">
                        </div>
                        <div>
                            <img src="https://plus.unsplash.com/premium_photo-1663100792050-04772fc1eb0a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=938&q=80" alt="">
                        </div>
                        <div>
                            <img src="https://plus.unsplash.com/premium_photo-1663100792050-04772fc1eb0a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=938&q=80" alt="">
                        </div>
                    </div>
                    <p class="mt-5 text-2xl">{{$product->stock ? '' : 'Hết hàng'}}</p>
                </div>
                <div class="w-6/12 ml-10">
                    <div class="w-full flex justify-between">
                        <h2 class="font-semibold text-3xl text-slate-800">{{$product->name}}</h2>
                    </div>
                    <div class="flex justify-between">
                        <div class="mt-5 text-lg text-slate-700 pb-10 border-b border-lime-600">
                            <div class="flex py-2 space-x-4">
                                <img class="h-fit" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u48.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Địa chỉ: {{$product->address}}</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img class="h-fit" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u50.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Người đăng: {{$product->owner_id}}</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img class="h-fit" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u52.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Liên hệ: {{$product->phone}}</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img class="h-fit" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u56.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Đơn vị: {{$product->unit}}</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img class="h-fit" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u54.png?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Trọng lượng: {{$product->weight . $product->weight_unit .'/'.$product->unit}}</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img class="h-fit" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u58.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Số lượng: {{$product->quantity}}</p>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <img class="h-fit" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/my_page_-_danh_s_ch_nh_n/u60.svg?pageId=f31a1a14-4dae-44bb-8425-5e21d392a7ee"
                                    width="25px" alt="">
                                <p>Hạn sử dụng: {{$product->expiration}}</p>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-col space-y-5 border-b border-lime-600">
                            <a href="#">
                                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/chi_ti_t_s_n_ph_m_-_ng__i_t_ng/u106.svg?pageId=04d69dba-73c1-476e-b61e-a826cf89da1e" 
                                width="30px" alt="">
                            </a>
                            <a href="#">
                                <img class="h-fit" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/chi_ti_t_s_n_ph_m_-_ng__i_t_ng/u134.svg?pageId=04d69dba-73c1-476e-b61e-a826cf89da1e" 
                                width="30px" alt="">
                            </a>
                            <a href="#">
                                <img class="h-fit" src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/chi_ti_t_s_n_ph_m_-_ng__i_t_ng/u133.svg?pageId=04d69dba-73c1-476e-b61e-a826cf89da1e" 
                                width="30px" alt="">
                            </a>
                        </div>
                    </div>
                    <div>
                        <p class="my-4 text-2xl text-bold">Mô tả</p>
                        <span class="text-base inline-block mb-5">{{$product->desc}}</span>
                    </div>
                </div>
            </div>
            <div>Thông tin người đăng ký</div>
        </div>
        <div class="lg:w-3/12 w-full border border-slate-400 h-48 text-xl text-center">
            Banner
        </div>
    </div>
</x-app-layout>