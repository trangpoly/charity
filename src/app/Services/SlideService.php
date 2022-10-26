<?php

namespace App\Services;

use App\Repositories\Slide\SlideRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SlideService extends BaseService
{
    protected $slideRepository;

    public function __construct(SlideRepositoryInterface $slideRepository)
    {
        $this->slideRepository = $slideRepository;
    }

    public function getSlideList()
    {
        return $this->slideRepository->getSlideList();
    }

    public function activeSlide($id)
    {
        $activeSlides = $this->slideRepository->getSlidesActive();

        if ($activeSlides->count() >= 3) {
            return false;
        } else {
            $attribute['status'] = 0;
            $this->slideRepository->update($id, $attribute);

            return true;
        }
    }

    public function disableSlide($id)
    {
        $attribute['status'] = 1;

        return $this->slideRepository->update($id, $attribute);
    }

    public function getSlides()
    {
        return $this->slideRepository->getSlides();
    }

    public function storeSlide($request)
    {
        DB::beginTransaction();
        try {
            $activeSlides = $this->slideRepository->getSlidesActive();

            if ($request->status == 0 && $activeSlides->count() >= 3) {
                return true;
            } else {
                $attribute = [
                    'path' => $request->image->hashName(),
                    'status' => $request->status,
                ];

                Storage::disk('public')->put('images', $request->image);
                $this->slideRepository->create($attribute);
                DB::commit();

                return false;
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }

    public function findSlide($id)
    {
        return $this->slideRepository->find($id);
    }

    public function updateSlide($id, $request)
    {
        DB::beginTransaction();
        try {
            $activeSlides = $this->slideRepository->getSlidesActive();

            foreach ($activeSlides as $slide) {
                if ($request->status == 0 && $activeSlides->count() >= 3) {
                    if ($slide->id == $id) {
                        if (isset($request->image)) {
                            $attribute = [
                                'path' => $request->image->hashName(),
                                'status' => $request->status,
                            ];
                            Storage::disk('public')->put('images', $request->image);
                            $this->slideRepository->update($id, $attribute);
                            DB::commit();

                            return false;
                        } else {
                            return false;
                        }
                    }

                    return true;
                } else {
                    if (isset($request->image)) {
                        $attribute = [
                            'path' => $request->image->hashName(),
                            'status' => $request->status,
                        ];
                        Storage::disk('public')->put('images', $request->image);
                        $this->slideRepository->update($id, $attribute);
                        DB::commit();

                        return false;
                    } else {
                        $attribute['status'] = $request->status;
                        $this->slideRepository->update($id, $attribute);
                        DB::commit();

                        return false;
                    }
                }
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }

    public function deleteSlide($id)
    {
        $activeSlides = $this->slideRepository->getSlidesActive();

        foreach ($activeSlides as $slide) {
            if ($slide->id == $id) {
                return false;
            } else {
                $this->slideRepository->delete($id);

                return true;
            }
        }
    }
}
