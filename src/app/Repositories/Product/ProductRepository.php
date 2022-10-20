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
            ->with(['images', 'receivers', 'giver', 'subCategory'])
            ->with('favourite', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })
            ->with('orders', function ($q) {
                $q->where('receiver_id', Auth::user()->id);
            })
            ->findOrFail($id);
    }

    public function list()
    {
        return $this->model->with('images')->with('orders', function ($q) {
            $q->where('status', 1);
        })->paginate(10);
    }

    public function getProductsBySubCategory($id)
    {
        return $this->model->whereHas('subCategory', function ($q) use ($id) {
            $q->where('id', $id);
        })->paginate(12);
    }

    public function getSubCategory()
    {
        return $this->model->with('subCategory')->first();
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

    public function getUserPosts($userId)
    {
        return $this->model->where('owner_id', $userId)->with('giver')->limit(5)->get();
    }

    public function findPostWithImages($id)
    {
        return $this->model->with('images')->findOrFail($id);
    }
}
