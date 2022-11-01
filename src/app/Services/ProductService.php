<?php

namespace App\Services;

use App\Models\ProductImage;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Favourite\FavouriteRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use App\Repositories\Province\ProvinceRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
    protected $productRepository;
    protected $userRepository;
    protected $categoryRepository;
    protected $productImagesRepository;
    protected $favouriteRepostitory;
    protected $provinceRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        UserRepositoryInterface $userRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductImageRepositoryInterface $productImagesRepository,
        FavouriteRepositoryInterface $favouriteRepostitory,
        ProvinceRepositoryInterface $provinceRepository,
    ) {
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productImagesRepository = $productImagesRepository;
        $this->favouriteRepostitory = $favouriteRepostitory;
        $this->provinceRepository = $provinceRepository;
    }

    public function getProduct($id)
    {
        return $this->productRepository->getProductDetail($id);
    }

    public function list()
    {
        return $this->productRepository->list();
    }

    public function getProductsBySubCategory($id)
    {
        return $this->productRepository->getProductsBySubCategory($id);
    }

    public function getProvince()
    {
        return $this->provinceRepository->getProvinces();
    }

    public function getSubCategory()
    {
        return $this->categoryRepository->getSubCategoriesProduct();
    }

    public function find($id)
    {
        return $this->productRepository->find($id);
    }

    public function saveCreate($request)
    {
        $product = [
            'name' => $request->name,
            'desc' => $request->desc,
            'avatar' => $request->avatar->hashName(),
            'unit' => $request->unit,
            'weight' => $request->weight,
            'expire_at' => $request->expire_at,
            'quantity' => $request->quantity,
            'weight_unit' => $request->weight_unit,
            'district' => $request->district,
            'city' => $request->city,
            'stock' => $request->quantity,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ];

        Storage::disk('public')->put('images/', $request->avatar);

        $productId = $this->productRepository->create($product);

        if ($request->images) {
            foreach ($request->images as $images) {
                Storage::disk('public')->put('images/', $images);
                $productImage = [
                    'path' => $images->hashName(),
                    'product_id' => $productId->id
                ];

                $this->productImagesRepository->create($productImage);
            }
        }
    }

    public function search(Request $request)
    {
        return $this->productRepository->search($request);
    }

    public function filter($sortExpireDate, $id)
    {
        return $this->productRepository->filter($sortExpireDate, $id);
    }

    public function filterSearch($sortExpireDate, $subCate)
    {
        return $this->productRepository->filterSearch($sortExpireDate, $subCate);
    }

    public function filterSearchAll($sortExpireDate, $id)
    {
        return $this->productRepository->filterSearchAll($sortExpireDate, $id);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }

    public function getRecommend($currentProductId, $categoryId)
    {
        return $this->productRepository->getRecommend($currentProductId, $categoryId);
    }

    public function getNearExpiryFood($currentProductId)
    {
        return $this->productRepository->getNearExpiryFood($currentProductId);
    }

    public function getCurrentUser()
    {
        return $this->userRepository->find(Auth::user()->id);
    }

    public function createProductImage($id, $request)
    {
        foreach ($request->avatar as $images) {
            Storage::disk('public')->put('images/', $images);
            $productImage = [
                'path' => $images->hashName(),
                'product_id' => $id
            ];

            $this->productImagesRepository->create($productImage);
        }
    }

    public function updateProduct($id, $request)
    {
        $attribute = $request->except('_token', 'idImage');

        $arrayImages = $request->idImage;

        $count = $this->productImagesRepository->countImages($request->id);

        if (
            $count == ($arrayImages == null ? -1 : count($arrayImages))
            && ($request->avatar == null ? true : count($request->avatar) == 0)
        ) {
            return false;
        }

        if ($request->has('idImage')) {
            foreach ($request->idImage as $img) {
                $ids[] = $img;
            }
            $this->productImagesRepository->deleteMultiple($ids);
        }

        if ($request->images) {
            foreach ($request->images as $images) {
                Storage::disk('public')->put('images/', $images);
                $productImage = [
                    'path' => $images->hashName(),
                    'product_id' => $id
                ];

                $this->productImagesRepository->create($productImage);
            }
        }

        $this->productRepository->update($id, $attribute);

        return true;
    }

    public function getParentCategories()
    {
        return $this->categoryRepository->getParentCategoryNotPaginate();
    }

    public function addFavourite($userId, $productId)
    {
        $attribute = [
            'product_id' => $productId,
            'user_id' => $userId,
        ];

        return $this->favouriteRepostitory->create($attribute);
    }

    public function removeFavourite($favouriteId)
    {
        return $this->favouriteRepostitory->delete($favouriteId);
    }

    public function makeStock($id, $data)
    {
        return $this->productRepository->update($id, $data);
    }

    public function searchProductByName($data)
    {
        return $this->productRepository->searchProductByName($data);
    }
}
