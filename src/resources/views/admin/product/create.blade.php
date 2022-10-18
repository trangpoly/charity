@extends('admin.layouts.master')
@section('title', ' Product Create')
@section('content')
    <div class="container">
        <div class="bg-blue-700 px-5 py-2">
            <p class="text-white font-semibold">Product Create</p>
        </div>
        <form action="{{ route('web.admin.product.saveCreate') }}" method="POST" class="w-8/12 ml-24 mt-5"
            enctype="multipart/form-data">
            @csrf
            <div class="flex mb-5">
                <p class="text-black text-sm w-3/12">Sub-Category<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <select class="w-full h-7 text-gray-700 text-sm bg-white border border-gray-500" name="category_id"
                        id="">
                        <option value="">Please select</option>
                        @foreach ($subCategory->subCategory->category->subCategory as $subCategory)
                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('category_id') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex">
                <p class="text-black w-3/12">Product Name<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="text" name="name" id="" class="w-full border border-gray-500">
                    @if ($errors->has('name'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Description</p>
                <textarea type="text" name="desc" id="" class="w-9/12 h-20 border border-gray-500"> </textarea>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Images<span class="text-red-700 ml-2">*</span></p>
                <input type="file" name="avatar[]" multiple class="text-gray-700 text-sm">
                @if ($errors->has('avatar'))
                    <span class="text-red-700 text-sm"> {{ $errors->first('avatar') }}</span>
                @endif
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Unit<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="text" name="unit" id="" class="w-5/12 border border-gray-500">
                    @if ($errors->has('unit'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('unit') }}</span>
                    @endif
                </div>

            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Weight / Unit<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="number" name="weight" id="" class="w-2/12 border border-gray-500">
                    @if ($errors->has('weight'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('weight') }}</span>
                    @endif
                    <select class="bg-white border border-gray-500 text-gray-800 text-sm ml-2 h-6" name="weight_unit"
                        id="">
                        <option value="gram">Gram</option>
                        <option value="kg">Kg</option>
                    </select>
                </div>


            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Quantity<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="number" name="quantity" id="" class="w-2/12 border border-gray-500">
                    @if ($errors->has('quantity'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('quantity') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Expiration date<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="date" name="expire_at" id=""
                        class="w-2/12 h-7 border border-gray-500 text-sm text-gray-700">
                    @if ($errors->has('expire_at'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('expire_at') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Address<span class="text-red-700 ml-2">*</span></p>
                <div class="w-9/12">
                    <div class="flex">
                        <div class="flex-col w-9/12 h-10">
                            <select class="bg-white border border-gray-500 text-gray-700 text-sm w-5/12 h-6" name="city"
                                id="">
                                <option value="">Select City</option>
                                <option value="Ha Noi">Ha noi</option>
                                <option value="Ninh Binh">Ninh Binh</option>
                            </select>
                            @if ($errors->has('city'))
                                <span class="text-red-700 text-sm"> {{ $errors->first('city') }}</span>
                            @endif
                        </div>
                        <div class="flex-col w-9/12">
                            <select class="bg-white border border-gray-500 text-gray-700 text-sm w-4/12  h-6"
                                name="district" id="">
                                <option value="">Select District</option>
                                <option value="Cau Giay">Cau Giay</option>
                                <option value="Ha Dong">Ha Dong</option>
                            </select>
                            @if ($errors->has('district'))
                                <span class="text-red-700 text-sm"> {{ $errors->first('district') }}</span>
                            @endif
                        </div>
                    </div>
                    <input type="text" name="address" id=""
                        class="h-7 w-9/12 mt-5 border border-gray-500 text-sm text-gray-700"
                        placeholder="Enter detailed address infomation">
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Phone Number<span class="text-red-700 ml-2">*</span></p>
                <div class="flex-col w-9/12">
                    <input type="text" name="phone" id=""
                        class="h-7 border border-gray-500 text-sm w-5/12">
                    @if ($errors->has('phone'))
                        <span class="text-red-700 text-sm"> {{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Status<span class="text-red-700 ml-2">*</span></p>
                <div class="w-9/12 flex space-x-8 text-gray-700">
                    <div class="flex-col">
                        <div class="space-x-2">
                            <input type="radio" id="1" name="status" selected value="0">
                            <label>Active</label><br>
                        </div>
                        <div class="space-x-2">
                            <input type="radio" id="2" name="status" value="1">
                            <label>Deactive</label><br>
                        </div>
                        @if ($errors->has('status'))
                            <span class="text-red-700 text-sm"> {{ $errors->first('status') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-2/12 space-x-2 mt-5 float-right flex justify-end">
                <a href="" class="bg-white border border-gray-500 rounded-md px-4 py-1">Back</a>
                <button type="submit" class="bg-yellow-600 text-white rounded-md border-gray-500 px-4 py-1">Save</button>
            </div>
        </form>
    </div>
@endsection
