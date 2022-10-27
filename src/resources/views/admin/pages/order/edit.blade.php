@extends('admin.layouts.master')
@section('title', ' Edit Order')
@section('content')
    <div class="container">
        <div class="bg-blue-700 px-5 py-2">
            <p class="text-white font-semibold">Edit Order</p>
        </div>
        <form action="{{ route('web.admin.order.update', ['id' => $order->id]) }}" method="POST" class="w-8/12 ml-24 mt-5">
            @csrf          
            <div class="flex mt-16 items-center">
                <p class="text-black w-3/12">Status</p>
                <div class="flex flex-col w-9/12">
                    <select class="h-8 w-2/3 border border-gray-300 px-2" name="status" id="category-search">
                        <option value="0" {{$order->status == 0 ? 'selected' : ''}}>Registered</option>
                        <option value="1" {{$order->status == 1 ? 'selected' : ''}}>Received</option>
                        <option value="2" {{$order->status == 2 ? 'selected' : ''}}>Cancelled</option>
                    </select>     
                    @if (session()->has('msg'))
                        <p class="text-red-500">{{session()->pull('msg')}}</p>
                    @endif           
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Product Name</p>
                <div class="flex flex-col w-9/12">
                    <input disabled type="text" name="product_name" id="" value="{{$order->product->name ?? ''}}" class="w-full border border-gray-500">
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Giver's Name</p>
                <div class="flex flex-col w-9/12">
                    <input disabled type="text" name="giver_name" id="" value="{{$order->giver->name}}" class="w-full border border-gray-500">
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Recipient's Name</p>
                <div class="flex flex-col w-9/12">
                    <input disabled type="text" name="recipient_name" id="" value="{{$order->receiver->name}}" class="w-full border border-gray-500">
                </div>
            </div>
            <div class="flex mt-5">
                <p class="text-black w-3/12">Received Date</span></p>
                <div class="flex flex-col w-9/12">
                    <input  disabled type="text" name="received_date" id="" value="{{$order->received_date}}" class="w-full border border-gray-500">
                </div>
            </div>
            <div class="w-1/3 space-x-2 mt-5 float-right flex justify-end">
                <a href="" class="bg-white border border-gray-500 px-4 py-1">Back</a>
                <button type="submit" class="bg-yellow-600 text-white border border-gray-500 px-4 py-1">Submit</button>
            </div>
        </form>
    </div>
@endsection
