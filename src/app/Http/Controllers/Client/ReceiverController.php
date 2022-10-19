<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\ReceiverService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiverController extends Controller
{
    public $receiverService;

    public function __construct(ReceiverService $receiverService)
    {
        $this->receiverService = $receiverService;
    }

    public function registeredList()
    {
        $userId = Auth::user()->id;
        $registedList = $this->receiverService->getRegisteredList($userId);

        return view('client.receiver.registered-list', ['registedList' => $registedList]);
    }

    public function undoRegisted(Request $request)
    {
        $this->receiverService->undoRegisted($request->id);
    }

    public function confirmReceived(Request $request)
    {
        $this->receiverService->confirmReceived($request->id);
    }

    public function receivedList()
    {
        $userId = Auth::user()->id;
        $receivedList = $this->receiverService->getreceivedList($userId);

        return view('client.receiver.received-list', ['receivedList' => $receivedList]);
    }

    public function canceledList()
    {
        $userId = Auth::user()->id;
        $canceledList = $this->receiverService->getcanceledList($userId);

        return view('client.receiver.canceled-list', ['canceledList' => $canceledList]);
    }

    public function reRegistered(Request $request)
    {
        $this->receiverService->reRegistered($request->id);
    }
}
