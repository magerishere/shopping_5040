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
    public function __construct()
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

        $product->slug()->create([
            'content' => $data['slug'],
        ]);

        return $product;
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);

        if ($data['slug'] !== $product->slugContent) {
            $product->slug()->create([
                'content' => $data['slug']
            ]);
        }

        $product->refresh();

        return $product;
    }

}
