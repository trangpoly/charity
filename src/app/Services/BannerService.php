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
        return $this->bannerRepository->all();
    }

    public function upload($request)
    {
        DB::beginTransaction();
        try {
            $bannerImgs = $request->image;

            foreach ($bannerImgs as $key => $image) {
                $findIndexImg = $this->bannerRepository->findIndex($key);
                Storage::disk('public')->put('images', $image);
                $imgData = [
                    'path' => $image->hashName(),
                    'index_position' => $key,
                ];
                if ($findIndexImg) {
                    $updateId = $findIndexImg->id;
                    $this->bannerRepository->update($updateId, $imgData);
                } else {
                    $this->bannerRepository->create($imgData);
                }
            }
            DB::commit();

            return false;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }

    public function update($banner)
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
