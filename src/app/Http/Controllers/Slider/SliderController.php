<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Services\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    // public function home()
    // {
    //     $sliders = $this->sliderService->getSliders();
    //     dd($sliders);
    //     return view('pages.home');
    // }
}
