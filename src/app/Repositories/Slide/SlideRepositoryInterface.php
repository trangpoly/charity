<?php

namespace App\Repositories\Slide;

use App\Repositories\BaseRepositoryInterface;

interface SlideRepositoryInterface extends BaseRepositoryInterface
{
    public function getSlideList();

    public function countSlideActive();

    // public function getSlides();
}
