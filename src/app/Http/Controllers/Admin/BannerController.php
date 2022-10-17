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
        $banners = $this->bannerService->getData();

        return view('admin.pages.banners.banner-setting', ['banners' => $banners]);
    }

    public function uploadBanner(Request $request)
    {
        $status = $this->bannerService->upload($request);
        $msg = $status ? 'Something went wrong !' : 'Cập nhập banner thành công !';

        return redirect()->route('web.admin.banner.setting')->with(['msg' => $msg, 'status' => $status]);
    }
}
