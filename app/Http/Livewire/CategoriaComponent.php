<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;   //carrito de compras
use App\Models\Categoria;

class CategoriaComponent extends Component
{

    public $sorting;
    public $pagesize;
    public $categorie_slug;

    public function mount($slug){
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $slug;
    }

    public function store($producto_id, $producto_nombre, $producto_precio){
        Cart::add($producto_id, $producto_nombre, 1, $producto_precio)->associate('App\Models\Producto');
        session()->flash('success_mesage', 'Producto añadido al carrito');
        return redirect()->route('producto.cart');
    }

    use WithPagination;

    public function render()
    {
        $category = Categoria::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->nombre;

        if ($this->sorting=='date') {

            $productos = Producto::where('categoria_id', $category_id)->orderby('created_at', 'DESC')->paginate($this->pagesize);

        } else if ($this->sorting=='price') {

            $productos = Producto::where('categoria_id', $category_id)->orderby('precio_venta', 'ASC')->paginate($this->pagesize);

        } elseif ($this->sorting=='price-des'){

            $productos = Producto::where('categoria_id', $category_id)->orderby('precio_venta', 'DESC')->paginate($this->pagesize);

        }else{

            $productos = Producto::where('categoria_id', $category_id)->paginate($this->pagesize);

        }

        $categorias = Categoria::all();

        return view('livewire.categoria-component', ['productos'=>$productos, 'categorias'=>$categorias, 'category_name'=>$category_name])->layout("layouts.base");
    }

}
