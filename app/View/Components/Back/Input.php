<?php

namespace App\View\Components\Back;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $inputId, public string $inputName, public string $labelText, public string $inputType = 'text', public string $inputValue = '', public int $size = 12, public int $sizeMd = 6, public int $sizeLg = 4)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back.input');
    }
}
