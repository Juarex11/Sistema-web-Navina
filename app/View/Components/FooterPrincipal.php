<?php

namespace App\View\Components;

use Closure;
use App\Models\SiteInfo;;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterPrincipal extends Component
{
    public $info;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->info = SiteInfo::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        return view('components.footer-principal');
    }
}
