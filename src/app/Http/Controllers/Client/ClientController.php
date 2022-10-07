<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function received_list()
    {
        return view('client.receiver.receivedList');
    }

    public function registered_list()
    {
        return view('client.receiver.registeredList');
    }

    public function canceled_list()
    {
        return view('client.receiver.canceledList');
    }
}
