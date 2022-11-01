<?php

namespace App\Repositories\Notification;

use App\Repositories\BaseRepositoryInterface;

interface NotificationRepositoryInterface extends BaseRepositoryInterface
{
    public function getNotifyByUser($id);

    public function markAllNotifyAsRead($userId);
}
