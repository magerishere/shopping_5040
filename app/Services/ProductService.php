<?php

namespace App\Services;


use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProductService
{
    /**
     * Create a new ProductService service.
     *
     * @return void
     */
    public function __construct(protected SlugService $slugService)
    {
        //
    }

    private function getQuery(): Builder
    {
        return Product::query();
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->getQuery()->get();
    }

    public function create(array $data): Product
    {
        $product = $this->getQuery()->create($data);

        $this->slugService->useModel($product)->create($data['slug']);

        return $product;
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);

        if ($data['slug'] !== $product->slugContent) {
            $this->slugService->useModel($product)->update($data['slug']);
        }

        $product->refresh();

        return $product;
    }

    public function destroy(Product $product, bool $softDelete = true): Product
    {
        if ($softDelete) {
            $product->delete();
        } else {
            $product->forceDelete();
            $product->clearMediaCollection();
        }

        return $product;
    }

}
