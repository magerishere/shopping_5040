<?php

namespace App\View\Components\Back;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $routeName, public string $formMethod = 'POST', public bool $hasFile = false)
    {
        $this->formMethod = Str::upper($this->formMethod);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back.form');
    }
}
