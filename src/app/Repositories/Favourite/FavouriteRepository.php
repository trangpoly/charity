<?php

namespace App\Repositories\Favourite;

use App\Models\Favourite;
use App\Repositories\BaseRepository;
use App\Repositories\Favourite\FavouriteRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class FavouriteRepository extends BaseRepository implements FavouriteRepositoryInterface
{
    public function model()
    {
        return Favourite::class;
    }

    public function getFavouriteList()
    {
        return $this->model->get();
    }
}
