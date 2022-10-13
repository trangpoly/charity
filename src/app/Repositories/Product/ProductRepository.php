<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Carbon;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function model()
    {
        return Product::class;
    }

    public function getProductDetail($id)
    {
        return $this->model->with(['images', 'receivers'])->findOrFail($id);
    }

    public function getProductsBySubCategory($id)
    {
        return $this->model->whereHas('subCategory', function ($q) use ($id) {
            $q->where('id', $id);
        })->paginate(12);
    }


    public function search($request)
    {
        $subCate = $request->subCate ? $request->subCate : [];

        $city = $request->city;

        $district = $request->district;

        $dateStart = $request->dateStart;

        $dateEnd = $request->dateEnd;

        return $this->model->orWhere('city', $city)->orWhere('district', $district)->orWhereIn('category_id', $subCate)
            ->orWhereBetween('expire_at', [$dateStart, $dateEnd])->get();
    }

    public function filter($sortExpireDate, $id)
    {
        return $this->model->orderBy('expire_at', $sortExpireDate)->where('category_id', $id)->get();
    }

    public function getRecommend($currentProductId, $categoryId)
    {
        return $this->model
            ->where('category_id', $categoryId)
            ->where('stock', '<>', 0)
            ->where('expiration', '>=', Carbon::now()->toDateString())
            ->where('id', '<>', $currentProductId)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public function getNearExpiryFood($currentProductId)
    {
        return $this->model
            ->where('stock', '<>', 0)
            ->where('id', '<>', $currentProductId)
            ->whereBetween('expiration', [Carbon::now()->toDateString(), Carbon::now()->adddays(3)->toDateString()])
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }
}
