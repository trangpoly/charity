<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\GiverService;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GiverController extends Controller
{
    public $giverService;
    public $productService;

    public function __construct(GiverService $giverService, ProductService $productService)
    {
        $this->giverService = $giverService;
        $this->productService = $productService;
    }

    public function showGiverPostsRegistered()
    {
        $idUser = Auth::id();

        $productsRegistered = $this->giverService->findProductsRegistered($idUser);

        return view('client.giver.subscribe-giver', [
            'productsRegistered' => $productsRegistered
        ]);
    }

    public function showGiverPostsNotRegistered()
    {
        $productsNotRegistered = [];
        $products = $this->giverService->findProductsNotRegistered();

        foreach ($products as $product) {
            if (empty($product->orders->toArray())) {
                $productsNotRegistered[] = $product;
            }
        }

        return view('client.giver.not-registered', [
            "productsNotRegistered" => $productsNotRegistered
        ]);
    }

    public function markSoldOut($id)
    {
        $data = [
            "stock" => -1
        ];

        $this->productService->makeStock($id, $data);

        return redirect()->back();
    }

    public function showGiverPostsMarkedSoldOut()
    {
        $productsMarkedSolOut = [];
        $products = $this->giverService->findProductsMarkedSoldOut();

        foreach ($products as $product) {
            if (empty($product->orders->toArray())) {
                $productsMarkedSolOut[] = $product;
            }
        }

        return view('client.giver.marked-soldout', [
            "productsMarkedSolOut" => $productsMarkedSolOut
        ]);
    }

    public function showGiverPostsGived()
    {
        $idUser = Auth::id();
        $productsGived = [];
        $productsGived = $this->giverService->findProductsGived($idUser);

        return view('client.giver.gived', [
            "productsGived" => $productsGived
        ]);
    }
}
