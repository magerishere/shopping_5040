<?php

namespace App\Services;


use App\Models\Product;
use App\Models\Variation;
use Illuminate\Database\Eloquent\Builder;

class VariationService
{

    /**
     * Create a new VariationService service.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    private function getQuery(): Builder
    {
        return Variation::query();
    }

    public function getById(int|string $id): ?Variation
    {
        return $this->getQuery()->find($id);
    }

    public function updateOrCreate(Product $product, array $data): Variation
    {
        $variation = $product->variation()->updateOrCreate([
            'sku' => $data['sku'],
        ], $data);

        return $variation;
    }

}
