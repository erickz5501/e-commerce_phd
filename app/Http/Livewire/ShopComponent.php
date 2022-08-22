<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;   //carrito de compras
use App\Models\Categoria;

class ShopComponent extends Component
{

    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 10000;

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

    use WithPagination;

    public function render()
    {
        if ($this->sorting=='date') {
            $productos = Producto::whereBetween('precio_venta',[$this->min_price, $this->max_price])->orderby('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting=='price') {
            $productos = Producto::whereBetween('precio_venta',[$this->min_price, $this->max_price])->orderby('precio_venta', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting=='price-des'){
            $productos = Producto::whereBetween('precio_venta',[$this->min_price, $this->max_price])->orderby('precio_venta', 'DESC')->paginate($this->pagesize);
        }else{
            $productos = Producto::whereBetween('precio_venta',[$this->min_price, $this->max_price])->paginate($this->pagesize);
        }

        $categorias = Categoria::all();

        return view('livewire.shop-component', ['productos'=>$productos, 'categorias'=>$categorias])->layout("layouts.base");
    }

}
