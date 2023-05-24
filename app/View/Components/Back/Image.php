<?php

namespace App\View\Components\Back;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $imageSrc, public string $imageAlt = 'Image', public ?int $imageWidth = null, public ?int $imageHeight = null, public string $imageMode = 'circle')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back.image');
    }
}
