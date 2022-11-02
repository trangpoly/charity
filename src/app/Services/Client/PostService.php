<?php

namespace App\Services\Client;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use App\Repositories\Province\ProvinceRepositoryInterface;
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
    protected $notificationRepository;
    protected $orderRepository;
    protected $provinceRepository;
    protected $districtRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductImageRepositoryInterface $productImageRepository,
        NotificationRepositoryInterface $notificationRepository,
        OrderRepositoryInterface $orderRepository,
        ProvinceRepositoryInterface $provinceRepository,
        DistrictRepositoryInterface $districtRepository,
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productImageRepository = $productImageRepository;
        $this->notificationRepository = $notificationRepository;
        $this->orderRepository = $orderRepository;
        $this->provinceRepository = $provinceRepository;
        $this->districtRepository = $districtRepository;
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
            $images = $request->images;
            $removeImgs = json_decode($request->images_remove);
            $productData = $request->except(['images', '_token', 'images_remove']);
            $productData['avatar'] = $request->avatar->hashName();
            Storage::disk('public')->put('images', $request->avatar);
            $productData['stock'] = $request->quantity;
            $productData['owner_id'] = Auth::id();

            if (!$productData['stock'] == 0) {
                $productData['status'] = 1;
            } else {
                $productData['status'] = 0;
            }

            $product = $this->productRepository->create($productData);

            foreach ($images as $image) {
                if ($removeImgs && !in_array($image->getClientOriginalName(), $removeImgs)) {
                    Storage::disk('public')->put('images', $image);

                    $productImage = [
                        'path' => $image->hashName(),
                        'product_id' => $product->id,
                    ];
                    $this->productImageRepository->create($productImage);
                } elseif ($removeImgs == null) {
                    Storage::disk('public')->put('images', $image);

                    $productImage = [
                        'path' => $image->hashName(),
                        'product_id' => $product->id,
                    ];
                    $this->productImageRepository->create($productImage);
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

    public function find($id)
    {
        return $this->productRepository->findPostWithImages($id);
    }

    public function findSubCategory($subCategoryId)
    {
        return $this->categoryRepository->findSubCategory($subCategoryId);
    }

    public function findParentCategory($parentCategoryId)
    {
        return $this->categoryRepository->findParentCategory($parentCategoryId);
    }

    public function delImage($id)
    {
        DB::beginTransaction();
        try {
            $this->productImageRepository->delImage($id);
            DB::commit();

            return false;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }

    public function updateProduct($request, $id)
    {
        DB::beginTransaction();
        try {
            $productData = $request->except([
                'images',
                '_token',
                '_method',
                "images_hidden",
                "images_old",
                "images_remove"
            ]);
            $productData['stock'] = $request->quantity;
            $productData['owner_id'] = Auth::id();

            if ($request->avatar != null) {
                Storage::disk('public')->put('images', $request->avatar);
                $productData['avatar'] = $request->avatar->hashName();
            }

            if (!$productData['stock'] == 0) {
                $productData['status'] = 1;
            } else {
                $productData['status'] = 0;
            }

            $this->productRepository->update($id, $productData);

            $images_remove = json_decode($request->images_remove);

            if ($request->images) {
                foreach ($request->images as $image) {
                    if ($images_remove && !in_array($image->getClientOriginalName(), $images_remove)) {
                        Storage::disk('public')->put('images', $image);

                        $productImage = [
                            'path' => $image->hashName(),
                            'product_id' => $id,
                        ];
                        $this->productImageRepository->create($productImage);
                    } elseif ($images_remove == null) {
                        Storage::disk('public')->put('images', $image);

                        $productImage = [
                            'path' => $image->hashName(),
                            'product_id' => $id,
                        ];
                        $this->productImageRepository->create($productImage);
                    }
                }
            }

            DB::commit();

            $product = $this->productRepository->find($id);
            $orders = $this->orderRepository->getOrderByProductId($id);

            $notification = [
                'title' => 'đã thay đổi nội dung sản phẩm',
                'type' => 'App\Models\Product::class',
                'relate_id' => $id,
                'actor_id' => $product->owner_id,
                'read_at' => null
            ];

            foreach ($orders as $item) {
                $notification['notifier_id'] = $item->receiver_id;
                $this->notificationRepository->create($notification);
            }

            return false;
        } catch (Exception $e) {
            dd($e);
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }

    public function loadProvince()
    {
        return $this->provinceRepository->getProvinces();
    }

    public function storeDuplicate($request)
    {
        DB::beginTransaction();
        try {
            $productData = $request->except([
                'images',
                '_token',
                '_method',
                "images_hidden",
                "images_old",
                "images_remove",
                'avatar_old',
            ]);
            $productData['stock'] = $request->quantity;
            $productData['owner_id'] = Auth::id();

            if ($request->avatar != null) {
                Storage::disk('public')->put('images', $request->avatar);
                $productData['avatar'] = $request->avatar->hashName();
            } else {
                $productData['avatar'] = $request->avatar_old;
            }

            if (!$productData['stock'] == 0) {
                $productData['status'] = 1;
            } else {
                $productData['status'] = 0;
            }

            $newProduct = $this->productRepository->create($productData);

            $images_remove = json_decode($request->images_remove);
            $images_old = json_decode($request->images_old);
            $images_hidden = ($request->images_hidden);

            foreach ($images_old as $item) {
                if (!in_array($item->path, ($images_hidden == null ? [] : $images_hidden))) {
                    $productImage = [
                        'path' => $item->path,
                        'product_id' => $newProduct->id,
                    ];

                    $this->productImageRepository->create($productImage);
                }
            }

            if ($request->images) {
                foreach ($request->images as $image) {
                    if ($images_remove && !in_array($image->getClientOriginalName(), $images_remove)) {
                        Storage::disk('public')->put('images', $image);

                        $productImage = [
                            'path' => $image->hashName(),
                            'product_id' => $newProduct->id,
                        ];
                        $this->productImageRepository->create($productImage);
                    } elseif ($images_remove == null) {
                        Storage::disk('public')->put('images', $image);

                        $productImage = [
                            'path' => $image->hashName(),
                            'product_id' => $newProduct->id,
                        ];
                        $this->productImageRepository->create($productImage);
                    }
                }
            }

            DB::commit();

            return false;
        } catch (Exception $e) {
            dd($e);
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }
}
