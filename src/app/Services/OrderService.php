<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class OrderService extends BaseService
{
    protected $orderRepository;

    protected $productRepository;

    protected $categoryRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
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

        if ($order) {
            $this->orderRepository->update($order->id, $attribute);

            return;
        }

        $this->orderRepository->create($attribute);
    }

    public function unsubscribe($product)
    {
        $userId = Auth::user()->id;
        $order = $this->orderRepository->checkOrderExist($product->id, $userId);
        $stock = $product->stock + $order->quantity;

        $this->productRepository->update($product->id, ['stock' => $stock]);
        $this->orderRepository->update($order->id, ['status' => 2]);
    }

    public function getOrders()
    {
        return $this->orderRepository->getOrdersDetail();
    }

    public function getSubCategory()
    {
        return $this->categoryRepository->getSubCategoriesProduct();
    }
}
