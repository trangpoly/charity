<?php

namespace App\Repositories\Notification;

use App\Repositories\BaseRepository;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Models\Notification;
use Carbon\Carbon;

class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{
    public function model()
    {
        return Notification::class;
    }

    public function getNotifyByUser($id)
    {
        return $this->model->with('actor')->where('notifier_id', $id)->orderBy('created_at', 'desc')->get();
    }

    public function getNumberNotifyUnread($id)
    {
        return ( $this->model
        ->where('notifier_id', $id)
        ->where('read_at', null)
        ->count());
    }

    public function markAllNotifyAsRead($userId)
    {
        return $this->model->where('notifier_id', $userId)->update(['read_at' => Carbon::now()]);
    }
}
