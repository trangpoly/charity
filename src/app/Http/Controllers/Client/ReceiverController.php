<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReceiverController extends Controller
{
    public function receivedList()
    {
        return view('client.receiver.received-list');
    }

    public function registeredList()
    {
        return view('client.receiver.registered-list');
    }

    public function canceledList()
    {
        return view('client.receiver.canceled-list');
    }
}
