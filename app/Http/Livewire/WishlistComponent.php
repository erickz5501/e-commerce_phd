<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function render()
    {
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

    public function moveProductFromWishlistToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->nombre, 1, $item->precio_venta)->associate('App\Models\Producto');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');

    }

}
