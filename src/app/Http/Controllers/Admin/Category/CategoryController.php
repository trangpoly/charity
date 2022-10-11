<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends BaseController
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function listCategory()
    {
        $categories = $this->categoryService->getListSubCategory();

        return view('admin.pages.categories.list', [
            'categories' => $categories
        ]);
    }

    public function addCategory()
    {
        return view('admin.pages.categories.add');
    }

    public function storeCategory(Request $request)
    {
        $data = $request->only([
            'name',
            'status'
        ]);

        $data['image'] = $request->file('image')->hashName();

        if ($request->hasFile('image') && $request->file('image')) {
            Storage::disk('public')->put('images', $request->file('image'));
        }

        $cateParent = $this->categoryService->create($data);

        foreach ($request->input('name_sub') as $name_sub) {
            $data = [
                "name" => $name_sub,
                "status" => $request->input('status'),
                "parent_id" => $cateParent->id
            ];

            $this->categoryService->create($data);
        }

        return redirect()->route('web.admin.categories.list');
    }
}
