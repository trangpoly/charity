<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;

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
}
