<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{

    use WithPagination;

    public function mount(){

    }

    public function render()
    {
        $productos = Producto::paginate(5);
        return view('livewire.admin.admin-product-component', ['productos' => $productos])->layout('layouts.base_admin');
    }
}
