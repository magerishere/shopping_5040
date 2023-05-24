<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'qty'
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
}
