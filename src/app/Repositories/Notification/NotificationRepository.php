<?php

namespace App\Repositories\Notification;

use App\Repositories\BaseRepository;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Models\Notification;

class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{
    public function model()
    {
        return Notification::class;
    }
}
