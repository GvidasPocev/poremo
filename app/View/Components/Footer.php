<?php

namespace App\View\Components;

use App\Helpers\Nav;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     */

    public $footerData;

    public function __construct()
    {
        $this->footerData = Nav::getFooter();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.footer');
    }
}
