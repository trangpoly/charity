<?php

namespace App\Services;

use App\Repositories\Slide\SlideRepositoryInterface;

class SlideService extends BaseService
{
    protected $slideRepository;

    public function __construct(SlideRepositoryInterface $slideRepository)
    {
        $this->slideRepository = $slideRepository;
    }

    public function getSlideList()
    {
        return $this->slideRepository->getSlideList();
    }

    public function activeSlide($id)
    {
        $activeSlides = $this->slideRepository->countSlideActive();

        if ($activeSlides >= 3) {
            return false;
        } else {
            $attribute['status'] = 0;
            $this->slideRepository->update($id, $attribute);

            return true;
        }
    }

    public function disableSlide($id)
    {
        $attribute['status'] = 1;

        return $this->slideRepository->update($id, $attribute);
    }

    // public function getSlides()
    // {
    //     return $this->slideRepository->getSlides();
    // }
}
