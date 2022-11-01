<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryService extends BaseService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategory($id)
    {
        return $this->categoryRepository->getCategoryDetail($id);
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->only([
                'name',
                'status',
                'expiration_date'
            ]);

            $data['image'] = $request->file('image')->hashName();

            if ($request->hasFile('image') && $request->file('image')) {
                Storage::disk('public')->put('images', $request->file('image'));
            }

            $cateParent = $this->categoryRepository->create($data);

            if ($request->input('name_sub')[0] != null && count($request->input('name_sub')) > 1) {
                foreach ($request->input('name_sub') as $nameSubCate) {
                    $data = [
                        "name" => $nameSubCate,
                        "status" => $request->input('status'),
                        "parent_id" => $cateParent->id
                    ];

                    $this->categoryRepository->create($data);
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

    public function getListParentCategoryWithSub()
    {
        return $this->categoryRepository->getListParentCategoryWithSub();
    }

    public function update($id, $data = [])
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function searchCategory($nameCate, $statusCate)
    {
        return $this->categoryRepository->searchCategory($nameCate, $statusCate);
    }

    public function paginateCategory($amountItem)
    {
        return $this->categoryRepository->paginateCategory($amountItem);
    }

    public function getProductsByCategory($id)
    {
        return $this->categoryRepository->getProductsByCategory($id);
    }

    public function getProductsByParentCategory()
    {
        return $this->categoryRepository->getProductsByParentCategory();
    }

    public function find($id)
    {
        return $this->categoryRepository->getCategories($id);
    }

    public function getProductsBySubCategory($id)
    {
        return $this->categoryRepository->getProductsBySubCategory($id);
    }

    public function getSubCategoriesProduct()
    {
        return $this->categoryRepository->getSubCategoriesProduct();
    }

    public function deleteParentCategory($id)
    {
        return $this->categoryRepository->getSubCategories($id)->count();
    }
}
