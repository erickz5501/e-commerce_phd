<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Sale;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function increaseQuantity(){
        $this->qty ++;

    }

    public function decreaseQuantity(){
        if ($this->qty > 1) {
            $this->qty --;
        }
    }

    public function store($producto_id, $producto_nombre, $producto_precio){
        Cart::instance('cart')->add($producto_id, $producto_nombre, $this->qty, $producto_precio)->associate('App\Models\Producto');
        session()->flash('success_mesage', 'Producto añadido al carrito');
        return redirect()->route('producto.cart');
    }

    public function render()
    {
        $productos = Producto::where('slug',$this->slug)->first();
        $popular_products= Producto::inRandomOrder()->limit(4)->get();
        $related_products = Producto::where('categoria_id',$productos->categoria_id)->inRandomOrder()->limit(5)->get();
        $sale = Sale::find(1);
        return view('livewire.details-component',['productos'=>$productos, 'popular_products'=>$popular_products, 'related_products'=>$related_products, 'sale'=>$sale])->layout('layouts.base');
    }
}
