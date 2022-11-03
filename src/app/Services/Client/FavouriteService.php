<?php

namespace App\Services\Client;

use App\Repositories\Favourite\FavouriteRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
class FavouriteService
{
    protected $favouriteRepository;
    protected $productRepository;

    public function __construct(
        FavouriteRepositoryInterface $favouriteRepository,
        ProductRepositoryInterface $productRepository,
    ) {
        $this->favouriteRepository = $favouriteRepository;
        $this->productRepository = $productRepository;
    }

    public function getFavouriteList()
    {
        $favouriteList = $this->favouriteRepository->getFavouriteList();

        foreach ($favouriteList as $favourite) {
            if (isset($favourite->product->orders)) {
                $checkOrderIsset = $favourite->product
                    ->orders()
                    ->where('receiver_id', Auth::user()->id)
                    ->count();
                $favourite['order_isset'] = $checkOrderIsset;

                if ($checkOrderIsset == 1) {
                    $checkOrderStatus = $favourite->product
                        ->orders()
                        ->where('receiver_id', Auth::user()->id)
                        ->first(['status', 'id']);
                    $favourite['order_status'] = $checkOrderStatus->status;
                    $favourite['order_id'] = $checkOrderStatus->id;
                }
            } else {
                $favourite['order_isset'] = 0;
            }
        };

        return $favouriteList;
    }
}
