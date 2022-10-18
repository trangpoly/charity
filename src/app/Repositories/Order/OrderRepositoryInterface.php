<?php

namespace App\Repositories\Order;

use App\Repositories\BaseRepositoryInterface;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function checkOrderExist($productId, $receiverId);

    public function getRegisteredList($userId);

    public function getreceivedList($userId);

    public function getcanceledList($userId);
}
