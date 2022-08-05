<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($producto_id, $producto_nombre, $producto_precio){
        Cart::add($producto_id, $producto_nombre, 1, $producto_precio)->associate('App\Models\Producto');
        session()->flash('success_mesage', 'Producto añadido al carrito');
        return redirect()->route('producto.cart');
    }

    public function render()
    {
        $productos = Producto::where('slug',$this->slug)->first();
        $popular_products= Producto::inRandomOrder()->limit(4)->get();
        $related_products = Producto::where('categoria_id',$productos->categoria_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component',['productos'=>$productos, 'popular_products'=>$popular_products, 'related_products'=>$related_products])->layout('layouts.base');
    }
}
