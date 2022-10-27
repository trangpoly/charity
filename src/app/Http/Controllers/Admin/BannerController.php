<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Services\BannerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class BannerController extends BaseController
{
    public $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function setting()
    {
        $banners = $this->bannerService->getBanners();

        return view('admin.pages.banners.banner-setting', ['banners' => $banners]);
    }

    public function uploadBanner(Request $request)
    {
        $bannerTop = [
            "path" => $request->path_banner_top ? $request->path_banner_top : "",
            "id" => $request->id_banner_top
        ];
        $this->bannerService->upload($bannerTop);

        $bannerMid = [
            "path" => $request->path_banner_mid ? $request->path_banner_mid : "",
            "id" => $request->id_banner_mid
        ];
        $this->bannerService->upload($bannerMid);

        $bannerBot = [
            "path" => $request->path_banner_bot ? $request->path_banner_bot : "",
            "id" => $request->id_banner_bot
        ];
        $this->bannerService->upload($bannerBot);

        return redirect()->route('web.admin.banner.setting');
    }
}
