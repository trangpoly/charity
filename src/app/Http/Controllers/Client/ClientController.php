<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\SliderService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $sliderService;
    protected $categoryService;

    public function __construct(
        SliderService $sliderService,
        CategoryService $categoryService
        )
    {
        $this->sliderService = $sliderService;
        $this->categoryService = $categoryService;
    }

    public function home()
    {
        $data = [];
        $data['sliders'] = $this->sliderService->getSliders();
        $data['categories'] = $this->categoryService->getProductsByParentCategory();

        return view('pages.home', [
            'data' => $data
        ]);
    }
}
