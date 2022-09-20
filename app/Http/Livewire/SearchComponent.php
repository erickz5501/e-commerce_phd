<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;   //carrito de compras
use App\Models\Categoria;

class SearchComponent extends Component
{

    public $sorting;
    public $pagesize;

    public $search;
    public $product_cat;
    public $product_cat_id;


    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    public function store($producto_id, $producto_nombre, $producto_precio){
        Cart::instance('cart')->add($producto_id, $producto_nombre, 1, $producto_precio)->associate('App\Models\Producto');
        session()->flash('success_mesage', 'Producto añadido al carrito');
        return redirect()->route('producto.cart');
    }
    public function addToWishlist($producto_id, $producto_nombre, $producto_precio)
    {
       Cart::instance('wishlist')->add($producto_id, $producto_nombre, 1, $producto_precio)->associate('App\Models\Producto');
       $this->emitTo('wishlist-count-component', 'refreshComponent');

    }
    public function removefromWishlist($producto_id){
        foreach(Cart::instance('wishlist')->content() as $witen ){
            Cart::instance('wishlist')->remove($witen->rowId);
            $this->emitTo('wishlist-count-component', 'refreshComponent');
            return;
        }
    }

    use WithPagination;

    public function render()
    {
        if ($this->sorting=='date') {
            $productos = Producto::where('nombre','like','%'.$this->search.'%')->where('categoria_id','like','%'.$this->product_cat_id.'%')->orderby('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting=='price') {
            $productos = Producto::where('nombre','like','%'.$this->search.'%')->where('categoria_id','like','%'.$this->product_cat_id.'%')->orderby('precio_venta', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting=='price-des'){
            $productos = Producto::where('nombre','like','%'.$this->search.'%')->where('categoria_id','like','%'.$this->product_cat_id.'%')->orderby('precio_venta', 'DESC')->paginate($this->pagesize);
        }else{
            $productos = Producto::where('nombre','like','%'.$this->search.'%')->where('categoria_id','like','%'.$this->product_cat_id.'%')->paginate($this->pagesize);
        }

        $categorias = Categoria::all();

        return view('livewire.search-component', ['productos'=>$productos, 'categorias'=>$categorias])->layout("layouts.base");
    }

}
