<?php

namespace App\Http\Controllers\Admin\Slide;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\SlideService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SlideController extends BaseController
{
    public $slideService;

    public function __construct(SlideService $slideService)
    {
        $this->slideService = $slideService;
    }

    public function getSlideList()
    {
        $slides = $this->slideService->getSlideList();

        return view('admin.slide.slide-list', ['slides' => $slides]);
    }

    public function activeSlide(Request $request)
    {
        return $this->slideService->activeSlide($request->id);
    }

    public function disableSlide(Request $request)
    {
        $this->slideService->disableSlide($request->id);
    }

    public function createSlide()
    {
        return view('admin.slide.slide-create');
    }

    public function storeSlide(Request $request)
    {
        $status = $this->slideService->storeSlide($request);
        $msg = $status ? 'Error! Something went wrong.' : 'Create Slide Successfully !';

        return redirect()->route('web.admin.slide.list')->with(['msg' => $msg, 'status' => $status]);
    }

    public function editSlide($id)
    {
        $slide = $this->slideService->findSlide($id);

        return view('admin.slide.slide-edit', ['slide' => $slide]);
    }

    public function updateSlide($id, Request $request)
    {
        $status = $this->slideService->updateSlide($id, $request);
        $msg = $status ? 'Error! Something went wrong.' : 'Update Slide Successfully !';

        return redirect()->route('web.admin.slide.list')->with(['msg' => $msg, 'status' => $status]);
    }

    public function deleteSlide(Request $request)
    {
        return $this->slideService->deleteSlide($request->id);
    }
}
