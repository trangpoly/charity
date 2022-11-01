<?php

namespace App\Services;

use App\Repositories\Notification\NotificationRepositoryInterface;

class NotificationService extends BaseService
{
    protected $notifyRepository;

    public function __construct(NotificationRepositoryInterface $notifyRepository)
    {
        $this->notifyRepository = $notifyRepository;
    }

    public function update($id, $attribute)
    {
        $this->notifyRepository->update($id, $attribute);
    }

    public function markAllNotifyAsRead($userId)
    {
        $this->notifyRepository->markAllNotifyAsRead($userId);
    }
}
