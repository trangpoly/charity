<?php

namespace App\Repositories\Favourite;

use App\Models\Favourite;
use App\Repositories\BaseRepository;
use App\Repositories\Favourite\FavouriteRepositoryInterface;

class FavouriteRepository extends BaseRepository implements FavouriteRepositoryInterface
{
    public function model()
    {
        return Favourite::class;
    }
}
