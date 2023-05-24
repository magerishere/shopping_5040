<?php

namespace App\Services;


use App\Jobs\ProductCreated;
use App\Jobs\ProductUpdated;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductService
{
    /**
     * Create a new ProductService service.
     *
     * @return void
     */
    public function __construct(protected SlugService $slugService, protected VariationService $variationService)
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
        $data['user_id'] = \Auth::id();

        $product = $this->getQuery()->create($data);

        $this->slugService->useModel($product)->create($data['slug']);

        $this->variationService->updateOrCreate($product, $data);

        ProductCreated::dispatch($product);

        return $product;
    }

    public function update(Product $product, array $data): Product
    {
        $data['user_id'] = \Auth::id();

        $product->update($data);

        if ($data['slug'] !== $product->slugContent) {
            $this->slugService->useModel($product)->update($data['slug']);
        }

        $this->variationService->updateOrCreate($product, $data);


        $product->refresh();

        ProductUpdated::dispatch($product);
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
