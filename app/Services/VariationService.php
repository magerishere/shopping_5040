<?php

namespace App\Services;


use App\Models\Product;
use App\Models\Variation;

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

    public function updateOrCreate(Product $product, array $data): Variation
    {
        $variation = $product->variation()->updateOrCreate([
            'sku' => $data['sku'],
        ], $data);

        return $variation;
    }

}
