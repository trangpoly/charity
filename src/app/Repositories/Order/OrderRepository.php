<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function model()
    {
        return Order::class;
    }

    public function checkOrderExist($productId, $receiverId)
    {
        $order = $this->model
            ->where('product_id', $productId)
            ->where('receiver_id', $receiverId)
            ->first();

        if (empty($order)) {
            return false;
        }

        return $order;
    }
}
