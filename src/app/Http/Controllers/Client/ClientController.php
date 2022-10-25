<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Services\CategoryService;
use App\Services\SliderService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $sliderService;
    protected $categoryService;
    protected $bannerService;

    public function __construct(
        SliderService $sliderService,
        CategoryService $categoryService,
        BannerService $bannerService
    ) {
        $this->sliderService = $sliderService;
        $this->categoryService = $categoryService;
        $this->bannerService = $bannerService;
    }

    public function home()
    {
        $data = [];
        $data['sliders'] = $this->sliderService->getSliders();
        $data['categories'] = $this->categoryService->getProductsByParentCategory();
        $data['banners'] = $this->bannerService->getBanners();

        return view('pages.home', [
            'data' => $data
        ]);
    }
}
