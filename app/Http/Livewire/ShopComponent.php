<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $productos = Producto::paginate(12);
        return view('livewire.shop-component', ['productos'=>$productos])->layout("layouts.base");
    }
}
