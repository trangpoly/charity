<?php

namespace App\Services\Client;

use App\Repositories\Order\OrderRepositoryInterface;

class ReceiverService
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getRegisteredList($userId)
    {
        return $this->orderRepository->getRegisteredList($userId);
    }

    public function getreceivedList($userId)
    {
        return $this->orderRepository->getreceivedList($userId);
    }

    public function getcanceledList($userId)
    {
        return $this->orderRepository->getcanceledList($userId);
    }

    public function undoRegisted($id)
    {
        $attribute['status'] = 2;

        return $this->orderRepository->update($id, $attribute);
    }

    public function confirmReceived($id)
    {
        $attribute['status'] = 1;

        return $this->orderRepository->update($id, $attribute);
    }

    public function reRegistered($id)
    {
        $attribute['status'] = 0;

        return $this->orderRepository->update($id, $attribute);
    }
}
