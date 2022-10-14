<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\BaseController;
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
        $parentCategories = $this->categoryService->getListParentCategoryWithSub();

        return view('admin.pages.categories.list', [
            'parentCategories' => $parentCategories
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
            'status',
            'expiration_date'
        ]);

        $data['image'] = $request->file('image')->hashName();

        if ($request->hasFile('image') && $request->file('image')) {
            Storage::disk('public')->put('images', $request->file('image'));
        }

        $cateParent = $this->categoryService->create($data);

        foreach ($request->input('name_sub') as $nameSubCate) {
            $data = [
                "name" => $nameSubCate,
                "status" => $request->input('status'),
                "parent_id" => $cateParent->id
            ];

            $this->categoryService->create($data);
        }

        return redirect()->route('web.admin.category.list');
    }

    public function detailCategory($id)
    {
        $parentCategory = $this->categoryService->getCategory($id);

        return view('admin.pages.categories.detail', [
            'parentCategory' => $parentCategory
        ]);
    }

    public function updateCategory(Request $request)
    {
        $data = $request->only([
            'name',
            'status',
            'expiration_date'
        ]);

        if ($request->file !== "undefined") {
            $data['image'] = $request->file->hashName();
            Storage::disk('public')->put('images', $request->file);
        }

        if ($request->file == "undefined") {
            $category = $this->categoryService->getCategory($request->id);
            $data['image'] = $category->image;
        }

        $this->categoryService->update($request->id, $data);

        if ($request->sub_cate_add) {
            foreach (json_decode($request->sub_cate_add, true) as $nameSubCateNew) {
                if ($nameSubCateNew) {
                    $this->categoryService->create([
                        "name" => $nameSubCateNew,
                        "status" => $request->status,
                        "parent_id" => $request->id
                    ]);
                }
            }
        }

        foreach (json_decode($request->sub_cate, true) as $subCate) {
            $this->categoryService->update($subCate["id"], [
                "name" => $subCate["name"]
            ]);
        }

        return response()->json($data);
    }

    public function searchCategory(Request $request)
    {
        $parentCategories = $this->categoryService->searchCategory($request->name, $request->status);

        return view('admin.pages.categories.list', [
            'parentCategories' => $parentCategories
        ]);
    }

    public function paginationCategory(Request $request)
    {
        $amountItem = $request->amount_item;
        $parentCategories = $this->categoryService->paginateCategory($amountItem);

        return response()->json($parentCategories);
    }

    public function deleteSubCategory($id)
    {
        $subCategories = $this->categoryService->getProductsByCategory($id);

        if (count($subCategories) == 0) {
            $this->categoryService->delete($id);
            return redirect()->back()->with('success', "Thanh cong");
        }

        return redirect()->back()->with('fail', "That bai");;
    }
}
