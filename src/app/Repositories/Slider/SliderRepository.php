<?php

namespace App\Repositories\Slider;

use App\Models\Slider;
use App\Repositories\BaseRepository;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
    public function model()
    {
        return Slider::class;
    }

    public function getSliders()
    {
        return $this->model->all();
    }
}
