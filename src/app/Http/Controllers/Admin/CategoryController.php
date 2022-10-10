<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        return view('admin.pages.categories.list');
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }
}
