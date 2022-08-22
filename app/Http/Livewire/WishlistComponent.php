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
        foreach(Cart::instance('wishlist')->content() as $witen ){
            Cart::instance('wishlist')->remove($witen->rowId);
            $this->emitTo('wishlist-count-component', 'refreshComponent');
            return;
        }
    }
}
