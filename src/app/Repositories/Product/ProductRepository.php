<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function model()
    {
        return Product::class;
    }

    public function getProductDetail($id)
    {
        return $this->model
            ->with(['images', 'receivers'])
            ->with('orders', function ($q) {
                $q->where('receiver_id', Auth::user()->id);
            })
            ->findOrFail($id);
    }

    public function getProductsBySubCategory($id)
    {
        return $this->model->whereHas('subCategory', function ($q) use ($id) {
            $q->where('id', $id);
        })->paginate(4);
    }

    public function getRecommend($currentProductId, $categoryId)
    {
        return $this->model
            ->where('category_id', $categoryId)
            ->whereNotIn('stock', [-1, 0])
            ->where('expire_at', '>=', Carbon::now()->toDateString())
            ->where('id', '<>', $currentProductId)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public function getNearExpiryFood($currentProductId)
    {
        return $this->model
            ->whereNotIn('stock', [-1, 0])
            ->where('id', '<>', $currentProductId)
            ->whereBetween('expire_at', [Carbon::now()->toDateString(), Carbon::now()->adddays(3)->toDateString()])
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }
}
