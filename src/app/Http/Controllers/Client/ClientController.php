<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function receivedList()
    {
        return view('client.receiver.receivedList');
    }

    public function registeredList()
    {
        return view('client.receiver.registeredList');
    }

    public function canceledList()
    {
        return view('client.receiver.canceledList');
    }
}
