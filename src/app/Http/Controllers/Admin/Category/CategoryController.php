<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\BaseController;
use App\Http\Requests\admin\CategoryRequest;
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

    public function storeCategory(CategoryRequest $request)
    {
        $status = $this->categoryService->create($request);

        $msg = $status ? 'Error! Something went wrong.' : 'Create Category Successfully !';

        return redirect()->route('web.admin.category.list')->with(['msg' => $msg, 'status' => $status]);
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

        return redirect()->back()->with('fail', "That bai");
    }

    public function category($id)
    {
        $category = $this->categoryService->find($id);

        $subCategory = $this->categoryService->getProductsBySubCategory($id);

        return view('pages.product.category', ['category' => $category, 'subCategory' => $subCategory, 'id' => $id]);
    }

    public function deleteCategory($id)
    {
        $countSubCategory = $this->categoryService->deleteParentCategory($id);

        if ($countSubCategory == 0) {
            $this->categoryService->delete($id);
            $status = false;
        } else {
            $status = true;
        }

        $msg = $status ? 'Not can Delete Category! This Category contain Sub Category'
            : 'Delete Category Successfully !';

        return redirect()->back()->with(['msg' => $msg, 'status' => $status]);
    }
}
