<?php

namespace App\Services;

use App\Repositories\Slider\SliderRepositoryInterface;

class SliderService extends BaseService
{
    protected $sliderRepository;

    public function __construct(SliderRepositoryInterface $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function getSliders()
    {
        return $this->sliderRepository->getSliders();
    }
}
