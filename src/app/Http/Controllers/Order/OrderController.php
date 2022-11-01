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

    public function showEditForm($id)
    {
        $order = $this->orderService->getOrder($id);

        return view('admin.pages.order.edit')->with('order', $order);
    }

    public function updateOrder(Request $request, $id)
    {
        $msg = $this->orderService->updateOrder($request, $id);

        if ($msg) {
            session(['msg' => $msg]);

            return redirect()->back();
        }
        session(['msg' => 'Update order successfully !']);
        session(['status' => false]);

        return redirect()->route('web.admin.order.list');
    }

    public function deleteOrder($id)
    {
        $status = $this->orderService->deleteOrder($id);

        if (!$status) {
            session(['msg' => 'Delete fail, orders are waiting to be received !']);
            session(['status' => true]);

        } else {
            session(['msg' => 'Delete order successfully !']);
            session(['status' => false]);

        }

        return redirect()->route('web.admin.order.list');
    }
}
