<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\BaseController;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function createOrder(Product $product, Request $request)
    {
        $this->orderService->createOrUpdate($product, $request);
        session(['msg' => 'Đăng ký thành công']);

        return redirect()->route('web.client.product.detail', ['id' => $product->id]);
    }

    public function unsubscribe(Product $product)
    {
        $this->orderService->unsubscribe($product);
        session(['msg' => 'Hủy đăng ký thành công']);

        return redirect()->route('web.client.product.detail', ['id' => $product->id]);
    }

    public function getOrders()
    {
        $orders = $this->orderService->getOrders();
        $categories = $this->orderService->getSubCategory();

        return view('admin.pages.order.list')->with(['orders' => $orders, 'categories' => $categories]);
    }
}
