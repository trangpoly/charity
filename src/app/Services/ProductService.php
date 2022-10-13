<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductService extends BaseService
{
    protected $productRepository;

    private const PAGE_LIMIT = 10;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProduct($id)
    {
        return $this->productRepository->getProductDetail($id);
    }

    public function list(array $options = [], $limit = self::PAGE_LIMIT)
    {
        return $this->productRepository->paginate($options, $limit);
    }

    public function getProductsBySubCategory($id)
    {
        return $this->productRepository->getProductsBySubCategory($id);
    }

    public function search(Request $request)
    {
        return $this->productRepository->search($request);
    }

    public function filter($sortExpireDate, $id)
    {
        return $this->productRepository->filter($sortExpireDate, $id);
    }

    public function getRecommend($currentProductId, $categoryId)
    {
        return $this->productRepository->getRecommend($currentProductId, $categoryId);
    }

    public function getNearExpiryFood($currentProductId)
    {
        return $this->productRepository->getNearExpiryFood($currentProductId);
    }
}
