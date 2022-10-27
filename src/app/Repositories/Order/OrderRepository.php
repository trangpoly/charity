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

    public function getRegisteredList($userId)
    {
        return $this->model->where('receiver_id', $userId)
            ->where('status', 0)
            ->with('product', 'giver')
            ->get();
    }

    public function getreceivedList($userId)
    {
        return $this->model->where('receiver_id', $userId)
            ->where('status', 1)
            ->with('product', 'giver')
            ->get();
    }

    public function getcanceledList($userId)
    {
        return $this->model->where('receiver_id', $userId)
            ->where('status', 2)
            ->with('product', 'giver')
            ->get();
    }

    public function getOrdersDetail()
    {
        return $this->model->with('product', 'giver', 'receiver', 'subCategory')->get();
    }

    public function getOrderDetail($id)
    {
        return $this->model->with('product', 'giver', 'receiver')->findOrFail($id);
    }
}
