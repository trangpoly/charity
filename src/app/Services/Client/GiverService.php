<?php

namespace App\Services\Client;

use App\Repositories\Product\ProductRepositoryInterface;

class GiverService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function findProductsRegistered($userId)
    {
        return $this->productRepository->findProductsRegistered($userId);
    }

    public function findProductsNotRegistered()
    {
        return $this->productRepository->findProductsNotRegistered();
    }

    public function findProductsMarkedSoldOut()
    {
        return $this->productRepository->findProductsMarkedSoldOut();
    }

    public function findProductsGived($userId)
    {
        return $this->productRepository->findProductsGived($userId);
    }
}
