<?php

namespace App\Services\Client;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostService
{
    protected $productRepository;
    protected $categoryRepository;
    protected $productImageRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductImageRepositoryInterface $productImageRepository,
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productImageRepository = $productImageRepository;
    }

    public function getParentCategories()
    {
        return $this->categoryRepository->getParentCategories();
    }

    public function getSubCategories($id)
    {
        return $this->categoryRepository->getSubCategories($id);
    }

    public function storeProduct($request)
    {
        DB::beginTransaction();
        try {
            $productData = $request->except(['images', '_token']);
            $productData['avatar'] = $request->images[0]->hashName();
            $productData['stock'] = $request->quantity;
            $productData['owner_id'] = Auth::id();

            if (! $productData['stock'] == 0) {
                $productData['status'] = 1;
            } else {
                $productData['status'] = 0;
            }

            $product = $this->productRepository->create($productData);

            foreach ($request->images as $image) {
                Storage::disk('public')->put('images', $image);
                $productImage = [
                    'path' => $image->hashName(),
                    'product_id' => $product->id,
                ];

                $this->productImageRepository->create($productImage);
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
