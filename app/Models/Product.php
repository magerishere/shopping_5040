<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use Sluggable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'brief_content',
        'content',
    ];

    public function defaultImage(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->getFirstMedia('default'), // if you want to change default product image to mobile, set collection name to mobile!
        );
    }

    public function variation()
    {
        return $this->hasOne(Variation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
