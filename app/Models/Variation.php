<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'sku',
        'price',
        'sale_price',
        'stock',
        'max_order'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
