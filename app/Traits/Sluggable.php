<?php

namespace App\Traits;

use App\Models\Slug;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait Sluggable
{
    public function slug()
    {
        return $this->morphOne(Slug::class, 'sluggable');
    }

    public function slugContent(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->slug?->content
        );
    }


}
