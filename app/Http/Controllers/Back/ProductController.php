<?php

namespace App\Http\Controllers\Back;

use App\Enums\DiskName;
use App\Enums\ProductMediaCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\ProductStoreRequest;
use App\Http\Requests\Back\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\UploadService;
use Illuminate\Http\Request;

class ProductController extends BackController
{
    public function __construct(protected ProductService $productService, protected UploadService $uploadService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productService->getAll();
        return view('back.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        try {

            $product = $this->productService->create($request->all());
            if ($imageDesktop = $request->file('image_desktop')) {

                $this->uploadService->uploadFile($product, $imageDesktop, ProductMediaCollection::DEFAULT, DiskName::PRODUCTS);
            }
            if ($imageMobile = $request->file('image_mobile')) {
                $this->uploadService->uploadFile($product, $imageMobile, ProductMediaCollection::MOBILE, DiskName::PRODUCTS);
            }
            $this->showSuccessAlert(" $product->title Successfully created");
            return to_route('admin.products.edit', $product->id);
        } catch (\Exception $exception) {
            report($exception);
            $this->showErrorAlert($exception->getMessage());
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('back.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            $product = $this->productService->update($product, $request->all());
            if ($imageDesktop = $request->file('image_desktop')) {
                $this->uploadService->uploadFile($product, $imageDesktop, ProductMediaCollection::DEFAULT, DiskName::PRODUCTS);
            }
            if ($imageMobile = $request->file('image_mobile')) {
                $this->uploadService->uploadFile($product, $imageMobile, ProductMediaCollection::MOBILE, DiskName::PRODUCTS);
            }
            $this->showSuccessAlert("$product->title Successfully Updated");
            return back();
        } catch (\Exception $exception) {
            report($exception);
            $this->showErrorAlert($exception->getMessage());
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
