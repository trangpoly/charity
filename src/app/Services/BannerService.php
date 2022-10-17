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

    public function getData()
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
}
