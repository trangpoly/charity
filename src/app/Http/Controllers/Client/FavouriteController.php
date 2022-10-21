<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseController;
use App\Services\Client\FavouriteService;
use Illuminate\Http\Request;

class FavouriteController extends BaseController
{
    protected $favouriteService;

    public function __construct(FavouriteService $favouriteService)
    {
        $this->favouriteService = $favouriteService;
    }

    public function list()
    {
        $favouriteList = $this->favouriteService->getFavouriteList();

        return view('client.favourite-list', ['favouriteList' => $favouriteList]);
    }
}
