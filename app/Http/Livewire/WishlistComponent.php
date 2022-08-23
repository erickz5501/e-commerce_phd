<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{



    public function render()
    {
        // $item = Cart::instance('wishlist')->get('027c91341fd5cf4d2579b49c4b6a90da');
        // var_dump($item);
        return view('livewire.wishlist-component')->layout('layouts.base');

    }

    public function removefromWishlist($producto_id){
        foreach(Cart::instance('wishlist')->content() as $witem ){
            if($witem->id == $producto_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            }
        }
    }

    public function mount(){

    }

    public function store($producto_id, $producto_nombre, $producto_precio){
        Cart::instance('cart')->add($producto_id, $producto_nombre, 1, $producto_precio)->associate('App\Models\Producto');
        session()->flash('success_mesage', 'Producto añadido al carrito');
        return redirect()->route('producto.cart');
    }

    public function moveProductFromWishlistToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->rowId, $item->name, 1, $item->price)->associate('App\Models\Producto');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

}
