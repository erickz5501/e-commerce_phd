<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;   //carrito de compras
class ShopComponent extends Component
{

    public function store($producto_id, $producto_nombre, $producto_precio){
        Cart::add($producto_id, $producto_nombre, 1, $producto_precio)->associate('App\Models\Producto');
        session()->flash('success_mesage', 'Producto añadido al carrito');
        return redirect()->route('producto.cart');
    }

    use WithPagination;
    public function render()
    {
        $productos = Producto::paginate(12);
        return view('livewire.shop-component', ['productos'=>$productos])->layout("layouts.base");
    }

}
