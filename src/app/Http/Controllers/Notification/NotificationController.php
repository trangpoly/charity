<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\BaseController;
use App\Models\Notification;
use App\Services\NotificationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends BaseController
{
    protected $notifytService;


    public function __construct(NotificationService $notifytService)
    {
        $this->notifytService = $notifytService;
    }

    public function getDetailNotify(Notification $notify)
    {
        $this->notifytService->update($notify->id, ['read_at' => Carbon::now()]);

        switch($notify->type) {
            case 'App\Models\Product::class':
                return redirect()->route('web.client.product.detail', ['id' => $notify->relate_id]);
        }
    }

    public function markAllNotifyAsRead()
    {
        $this->notifytService->markAllNotifyAsRead(Auth::user()->id);

        return;
    }
}
