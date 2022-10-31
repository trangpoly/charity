<?php

namespace App\Repositories\District;

use App\Models\District;
use App\Repositories\BaseRepository;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    public function model()
    {
        return District::class;
    }
}
