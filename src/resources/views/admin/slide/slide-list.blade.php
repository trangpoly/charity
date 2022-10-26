@extends('admin.layouts.master')
@section('title', ' Slide')
@section('content')
    @if (session('msg'))
        @if (session('status') == false)
        <div class="flex justify-end fixed top-0 right-0 z-40">
            <div id="toast-notify"
                class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow"
                role="alert">
                <div
                    class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-medium">{{ session('msg') }}</div>
                <button type="button" id="btn-close-alert"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-7 w-7"
                    data-dismiss-target="#toast-notify" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5 mt-1 ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        @elseif (session('status') == true)
        <div class="flex justify-end fixed top-0 right-0 z-40">
            <div id="toast-danger"
                class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow" role="alert">
                <div
                    class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('msg') }}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        @endif
    @endif
    <div class="container">
        <form action="" method="" class="w-full h-fix">
            <div class="input flex mb-5 space-x-4">
                <div class="">
                    <p class="text-black font-semibold">Slide name</p>
                    <input type="text" class="h-8 border text-sm text-gray-700 border-gray-400 px-2"
                        id="products-search-name" name="name" placeholder="Search...">
                </div>
                <div class="">
                    <p class="text-black font-semibold">Status</p>
                    <select class="h-8 text-gray-600 text-sm w-full bg-white border border-gray-400 px-2"
                        id="slides-search-status" name="">
                        <option value="">Please select</option>
                        <option value="active">Active</option>
                        <option value="disable">Disable</option>
                    </select>
                </div>
                <div class="space-x-6">
                    <p class="w-full ml-6 text-black font-semibold">Expiration data</p>
                    <div class="flex space-x-1">
                        <input type="date" class="h-8 border text-gray-600 text-sm border-gray-300 px-2" id="min"
                            name="">
                        <input type="date" class="h-8 border text-gray-600 text-sm border-gray-300 px-2" id="max"
                            name="">
                    </div>
                </div>
            </div>
            <div class="w-full h-fit bg-yellow-200 mb-5 text-center py-2 space-x-2">
                <button type="button" id="products-search"
                    class="bg-yellow-500 text-black py-1 px-10 border border-gray-300">Search</button>
                <button type="reset" class="bg-white text-blue-500 py-1 px-10 border border-gray-300">Reset</button>
            </div>
        </form>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <a href="{{ route('web.admin.slide.create') }}"
                class="z-10 flex space-x-4 px-2 py-1 bg-yellow-500 border border-gray-300 rounded-md absolute right-0">
                <p class="text-black text-sm">Create new</p>
                <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u131.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                    alt="">
            </a>
            <table id="table-slides" class="w-full pt-2 text-lg text-left text-gray-500 dark:text-gray-400">
                <thead class="text-md text-white bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            No
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Slide
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Create At
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Update At
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $key => $slide)
                    <tr id="item-box-{{ 1+$key }}"
                        class="bg-white border-b text-black dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="py-4 px-6 text-black">
                            {{ 1+$key++ }}
                        </td>
                        <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ Illuminate\Support\Facades\Storage::url('images/' . $slide->path) }}"
                                style="width: 100px; height: 67px" alt="">
                        </td>
                        <td id="btn-box-{{ $key }}" class="py-4 px-6">
                            @if ($slide->status == 0)
                            <button type="button" id="btn-active-{{ $key }}" value="active"
                                onclick="disableSlide('{{ $slide->id }}', '{{ $key }}')"
                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Active
                            </button>
                            @elseif ($slide->status == 1)
                            <button type="button" id="btn-disable-{{ $key }}" value="disable"
                                onclick="activeSlide('{{ $slide->id }}', '{{ $key }}')"
                                class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                Disable
                            </button>
                            @endif
                        </td>
                        {{-- <td class="py-4 px-6">
                            <img src="{{ Illuminate\Support\Facades\Storage::url('images/products/' . $item->images[0]->path) }}"
                                width="100px" alt="">
                        </td> --}}
                        <td class="py-4 px-6">
                            {{ $slide->created_at }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $slide->updated_at }}
                        </td>
                        <td class="py-4 px-6 flex space-x-3">
                            <a href="#">
                                <img width="30px"
                                    src="https://www.pngitem.com/pimgs/m/514-5143309_eye-open-font-awesome-green-eye-icon-font.png"
                                    alt="">
                            </a>
                            <a href="{{ route('web.admin.slide.edit', ['id' => $slide->id]) }}">
                                <img width="30px"
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u109.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                                    alt="">
                            </a>
                            <button id="btn-del-{{ $key }}" onclick="delSlide('{{ $slide->id }}','{{ $key }}')">
                                <img width="30px"
                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u110.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                                    alt="">
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
    function activeSlide(slide_id, index) {
        var url = "{{ route('web.admin.slide.active') }}";

        $(document).ready(function() {
            $.ajax(url, {
                type: 'POST',
                data: {
                    id: slide_id,
                },
                success: function(data) {
                    console.log(data);
                    if(data) {
                        console.log('success');
                        alert('Slide Has Been Active !');

                        $('#btn-disable-'+index).remove();
                        $('#btn-box-'+index).append(
                            `<button type="button" id="btn-active-`+ index +`"
                                onclick="disableSlide('`+ slide_id +`', '`+ index +`')"
                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Active
                            </button>`
                        );
                    } else {
                        alert('The Active Slide Should Not Be More Than 3 !');
                    }
                },
                error: function(e) {
                    console.log('fail');
                }
            });
        });
    }

    function disableSlide(slide_id, index) {
        var url = "{{ route('web.admin.slide.disable') }}";

        $(document).ready(function() {
            $.ajax(url, {
                type: 'POST',
                data: {
                    id: slide_id,
                },
                success: function(data) {
                    console.log('success');
                    alert('Slide Has Been Disable !');

                    $('#btn-active-'+index).remove();
                    $('#btn-box-'+index).append(
                        `<button type="button" id="btn-disable-`+ index +`"
                            onclick="activeSlide('`+ slide_id +`', '`+ index +`')"
                            class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                            Disable
                        </button>`
                    );
                },
                error: function(e) {
                    console.log('fail');
                }
            });
        });
    }

    function delSlide(slide_id, index) {
        var url = "{{ route('web.admin.slide.delete') }}";

        if (confirm("Are You Sure You Want To Delete This Slide ?") == true) {
            $(document).ready(function() {
            $.ajax(url, {
                type: 'DELETE',
                data: {
                    id: slide_id,
                },
                success: function(data) {
                    if (data) {
                        console.log('success');
                        alert('Slide Was Deleted !');
                        $('#item-box-'+index).remove();
                    } else {
                        alert('Cannot Delete Slide Is Being Active !');
                    }
                },
                error: function(e) {
                    console.log('fail');
                }
            });
        });
        }
    }

    $(document).ready(function() {
        $('#table-slides').DataTable({
            dom: 'lrtip'
        });

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min').val();
                var max = $('#max').val();
                var createdAt = data[7] || 0;
                if (
                    (min == "" || max == "") ||
                    (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
                ) {
                    return true;
                }
                return false;
            }
        );

        $('#slides-search').on('click', function() {
            $('#table-slides')
                .DataTable()
                .column(3)
                .search(
                    $('#slides-search-status option:selected').val()
                )
                .draw();
        });

        $('#btn-close-alert').on('click', function() {
            $('#btn-close-alert').parent().parent().remove();
        });

        // $('#products-search').on('click', function() {
        //     $('#table-products')
        //         .DataTable()
        //         .column(1)
        //         .search(
        //             $('#products-search-name').val()
        //         )
        //         .draw();
        // });
        // $('#products-search').on('click', function() {
        //     $('#table-products')
        //         .DataTable()
        //         .column(2)
        //         .search(
        //             $('#products-search-category option:selected').val()
        //         )
        //         .draw();
        // });
        // $('#products-search').on('click', function() {
        //     $('#table-products')
        //         .DataTable()
        //         .column(5)
        //         .search(
        //             $('#products-search-stock').val()
        //         )
        //         .draw();
        // });
    });
    </script>
@endsection
