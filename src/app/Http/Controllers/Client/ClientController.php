<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\SlideService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $slideService;
    protected $categoryService;
    protected $bannerService;
    protected $productServive;

    public function __construct(
        SlideService $slideService,
        CategoryService $categoryService,
        BannerService $bannerService,
        ProductService $productService
    ) {
        $this->slideService = $slideService;
        $this->categoryService = $categoryService;
        $this->bannerService = $bannerService;
        $this->productServive = $productService;
    }

    public function home()
    {
        $data = [
            'slides' => $this->slideService->getSlidesActive(),
            'categories' => $this->categoryService->getProductsByParentCategory(),
            'banners' => $this->bannerService->getBanners()
        ];

        return view('pages.home', $data);
    }
}
