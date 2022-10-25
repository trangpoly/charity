<?php

namespace App\Http\Controllers\Admin\Slide;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\SlideService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SlideController extends BaseController
{
    public $slideService;

    public function __construct(SlideService $slideService)
    {
        $this->slideService = $slideService;
    }

    public function getSlideList()
    {
        $slides = $this->slideService->getSlideList();

        return view('admin.slide.slide-list', ['slides' => $slides]);
    }

    public function activeSlide(Request $request)
    {
        return $this->slideService->activeSlide($request->id);
    }

    public function disableSlide(Request $request)
    {
        $this->slideService->disableSlide($request->id);
    }
}
