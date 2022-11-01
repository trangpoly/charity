<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Repositories\Notification\NotificationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class Notification extends Component
{
    public $notificationRepository;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $notify = $this->notificationRepository->getNotifyByUser(Auth::user()->id);
        $notifyUnread = $this->notificationRepository->getNumberNotifyUnread(Auth::user()->id);

        return view('components.notification', ['notify'=> $notify, 'notifyUnread' => $notifyUnread]);
    }
}
