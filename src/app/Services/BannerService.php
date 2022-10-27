<?php

namespace App\Services;

use App\Repositories\Banner\BannerRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BannerService extends BaseService
{
    protected $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function getBanners()
    {
        $banners = $this->bannerRepository->all();
        if (empty($banners->toArray())) {
            $banners['top'] = [
                "path" => "",
                "index_position" => 1
            ];
            $banners['mid'] = [
                "path" => "",
                "index_position" => 2
            ];
            $banners['bot'] = [
                "path" => "",
                "index_position" => 3
            ];
            foreach ($banners as $banner) {
                $this->bannerRepository->create($banner);
            }
        }

        return $banners;
    }

    public function upload($banner)
    {
        if ($banner['path'] != "") {
            $bannerDetail = $this->bannerRepository->find($banner['id']);

            if ($bannerDetail->path == $banner['path']) {
                return $this->bannerRepository->update($banner["id"], ["path" => $banner["path"]]);
            }

            Storage::disk('public')->put('banners', $banner['path']);
            $banner["path"] = $banner["path"]->hashName();
        }

        return $this->bannerRepository->update($banner["id"], ["path" => $banner["path"]]);
    }
}
