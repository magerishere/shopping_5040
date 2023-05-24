<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends FrontController
{
    public function __construct(protected ProductService $productService)
    {

    }

    public function index()
    {
        $products = $this->productService->getAll();

        return view('front.products.index', compact('products'));
    }
}
