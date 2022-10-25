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
        $this->bannerService->update($bannerTop);

        $bannerMid = [
            "path" => $request->path_banner_mid ? $request->path_banner_mid : "",
            "id" => $request->id_banner_mid
        ];
        $this->bannerService->update($bannerMid);

        $bannerBot = [
            "path" => $request->path_banner_bot ? $request->path_banner_bot : "",
            "id" => $request->id_banner_bot
        ];
        $this->bannerService->update($bannerBot);

        $status = $this->bannerService->upload($request);
        $msg = $status ? 'Something went wrong !' : 'Cập nhập banner thành công !';

        return redirect()->route('web.admin.banner.setting')->with(['msg' => $msg, 'status' => $status]);
    }
}
