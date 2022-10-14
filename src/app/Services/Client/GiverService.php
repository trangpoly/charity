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

    public function getAllGiverPost($userId)
    {
        return $this->productRepository->getUserPosts($userId);
    }
}
