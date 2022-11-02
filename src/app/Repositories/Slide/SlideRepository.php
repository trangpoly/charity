<?php

namespace App\Repositories\Slide;

use App\Models\Slide;
use App\Repositories\BaseRepository;

class SlideRepository extends BaseRepository implements SlideRepositoryInterface
{
    public function model()
    {
        return Slide::class;
    }

    public function getSlideList()
    {
        return $this->model->get();
    }

    public function getSlidesActive()
    {
        return $this->model->where('status', 0)->get();
    }
}
