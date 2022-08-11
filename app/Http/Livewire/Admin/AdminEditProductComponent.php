<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\withFileUploads;

class AdminEditProductComponent extends Component
{
    use withFileUploads;
    public $nombre;
    public $slug;
    public $short_descripcion;
    public $descripcion;
    public $precio_venta;
    public $precio_descuento;
    public $SKU;
    public $stock_estado;
    public $cantidad;
    public $imagen;
    public $categoria_id;
    public $newimagen;
    public $product_id;

    public function mount($product_slug)
    {
        $product = Producto::where('slug',$product_slug)->first();

        $this->nombre = $product->nombre;
        $this->slug = $product->slug;
        $this->short_descripcion = $product->short_descripcion;
        $this->descripcion = $product->descripcion;
        $this->precio_venta = $product->precio_venta;
        $this->precio_descuento = $product->precio_descuento;
        $this->SKU = $product->SKU;
        $this->stock_estado = $product->stock_estado;
        $this->cantidad = $product->cantidad;
        $this->imagen = $product->imagen;
        $this->categoria_id = $product->categoria_id;
        $this->newimagen = $product->newimagen;
        $this->product_id = $product->id;
    }

    public function generateSlug()
    {
    $this->slug = Str::slug($this->nombre,'-');
    }

    public function updateProduct()
    {
        $product = Producto::find($this->product_id);
        $product->nombre = $this->nombre;
        $product->slug = $this->slug;
        $product->short_descripcion = $this->short_descripcion;
        $product->descripcion = $this->descripcion;
        $product->precio_venta = $this->precio_venta;
        $product->precio_descuento = $this->precio_descuento;
        $product->SKU = $this->SKU;
        $product->stock_estado = $this->stock_estado;
        $product->cantidad = $this->cantidad;
        if ($this->newimagen) {
            $imageName = Carbon::now()->timestamp. '.' . $this->newimagen->extension();
            $this->newimagen->storeAs('products',$imageName);
            $product->imagen = $imageName;
        }
        $product->categoria_id = $this->categoria_id;
        $product->save();
        session()->flash('message','Producto actualizado satisfactoriamente');
    }

    public function render()
    {
        $categorias= Categoria::all();
        return view('livewire.admin.admin-edit-product-component',['categorias'=>$categorias])->layout('layouts.base_admin');
    }
}
