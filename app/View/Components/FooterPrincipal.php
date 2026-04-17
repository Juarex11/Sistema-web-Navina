<?php

namespace App\View\Components;

use Closure;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\SiteComentario;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Nette\Utils\Random;

class FooterPrincipal extends Component
{
    public $info;
    public $comments;

    public function __construct()
    {
        $this->info = SiteInfo::first();
        $this->comments = SiteComentario::latest()->limit(9)->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.footer-principal');
    }
}
