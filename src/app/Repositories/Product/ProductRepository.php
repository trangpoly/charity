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
            ->with('orders', function ($q) {
                $q->where('receiver_id', Auth::user()->id);
            })
            ->findOrFail($id);
    }

    public function list()
    {
        return $this->model->with('images')->with('orders', function ($q) {
            $q->where('status', 1);
        })->get();
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
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

    public function findProductsRegistered($userId)
    {
        return $this->model->whereHas("orders", function ($e) {
            $e->where('status', 0);
        })->whereHas("giver", function ($e) use ($userId) {
            $e->where("id", $userId);
        })->with("receivers")->get();
    }

    public function findPostWithImages($id)
    {
        return $this->model->with('images')->findOrFail($id);
    }

    public function findProductsNotRegistered()
    {
        return $this->model->with("orders")->whereNot('stock', -1)->get();
    }

    public function findProductsMarkedSoldOut()
    {
        return $this->model->with("orders")->where('stock', -1)->get();
    }

    public function findProductsGived($userId)
    {
        return $this->model->whereHas("orders", function ($e) {
            $e->where('status', 1);
        })->whereHas("giver", function ($e) use ($userId) {
            $e->where("id", $userId);
        })->with("receivers")->get();
    }
}
