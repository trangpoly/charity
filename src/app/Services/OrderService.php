<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class OrderService extends BaseService
{
    protected $orderRepository;

    protected $productRepository;

    protected $categoryRepository;

    protected $notificationRepository;
    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        NotificationRepositoryInterface $notificationRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->notificationRepository = $notificationRepository;
    }

    public function createOrUpdate($product, $request)
    {
        $userId = Auth::user()->id;
        $order = $this->orderRepository->checkOrderExist($product->id, $userId);
        $stock = $product->stock - $request->quantity;
        $this->productRepository->update($product->id, ['stock' => $stock]);

        $attribute = [
            'product_id' => $product->id,
            'receiver_id' => $userId,
            'giver_id' => $product->owner_id,
            'quantity' => $request->quantity,
            'status' => 0,
        ];

        $notification = [
            'title' => 'đã đăng ký nhận sản phẩm',
            'type' => 'App\Models\Product::class',
            'relate_id' => $product->id,
            'actor_id' => $userId,
            'notifier_id' => $product->owner_id,
            'read_at' => null
        ];

        if ($order) {
            $this->orderRepository->update($order->id, $attribute);
            $this->notificationRepository->create($notification);

            return;
        }
        $this->notificationRepository->create($notification);
        $this->orderRepository->create($attribute);
    }

    public function unsubscribe($product)
    {
        $userId = Auth::user()->id;
        $order = $this->orderRepository->checkOrderExist($product->id, $userId);
        $stock = $product->stock + $order->quantity;

        $this->productRepository->update($product->id, ['stock' => $stock]);
        $this->orderRepository->update($order->id, ['status' => 2]);

        $notification = [
            'title' => 'đã hủy đăng ký nhận sản phẩm',
            'type' => 'App\Models\Product::class',
            'relate_id' => $product->id,
            'actor_id' => $userId,
            'notifier_id' => $product->owner_id,
            'read_at' => null
        ];

        $this->notificationRepository->create($notification);
    }

    public function getOrders()
    {
        return $this->orderRepository->getOrdersDetail();
    }

    public function getSubCategory()
    {
        return $this->categoryRepository->getSubCategoriesProduct();
    }

    public function getOrder($id)
    {
        return $this->orderRepository->getOrderDetail($id);
    }

    public function updateOrder($request, $id)
    {
        $attribute = array();
        $order = $this->orderRepository->find($id);

        $attribute = [
            'status' => $request->status,
            'received_date' => $order->received_date,
        ];

        if ($request->status == 1 && $order->status != 1) {
            $attribute['received_date'] = Carbon::now()->toDateString();

            if ($order->status == 2) {
                $product = $this->productRepository->find($order->product_id);

                if ($order->quantity > $product->stock) {
                    return 'Số lượng sản phẩm không đủ';
                }

                $stock = $product->stock - $order->quantity;
                $this->productRepository->update($product->id, ['stock' => $stock]);
            }
        }

        if ($request->status == 0) {
            $attribute['received_date'] = null;

            if ($order->status == 2) {
                $product = $this->productRepository->find($order->product_id);

                if ($order->quantity > $product->stock) {
                    return 'Số lượng sản phẩm không đủ';
                }

                $stock = $product->stock - $order->quantity;
                $this->productRepository->update($product->id, ['stock' => $stock]);
            }
        }

        if ($request->status == 2 && $order->status != 2) {
            $attribute['received_date'] = null;
            $product = $this->productRepository->find($order->product_id);
            $stock = $product->stock + $order->quantity;

            $this->productRepository->update($product->id, ['stock' => $stock]);
        }

        $this->orderRepository->update($id, $attribute);

        return;
    }

    public function deleteOrder($id)
    {
        $order = $this->orderRepository->find($id);

        if ($order->status == 0) {
            return false;
        }

        $this->orderRepository->delete($id);

        return true;
    }
}
