<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends BaseController
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
