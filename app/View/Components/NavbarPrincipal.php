<?php
//REEMPLAZADO, PROVIDERS CONTIENE LA LOGICA.
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Category;

class NavbarPrincipal extends Component
{
    public $categories;

    public function __construct()
    {
        $this->categories = Category::all();
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar-principal');
    }
}
