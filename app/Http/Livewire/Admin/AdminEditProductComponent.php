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
    public $precio_mayorista;
    public $SKU;
    public $stock_estado;
    public $cantidad;
    public $imagen;
    public $categoria_id;
    public $newimagen;
    public $product_id;

    public $imagenes;
    public $newimagenes;

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
        $this->imagenes = explode(",",$product->imagenes);
        $this->product_id = $product->id;
    }

    public function generateSlug()
    {
    $this->slug = Str::slug($this->nombre,'-');
    }

    public function updated($fields)
{
    $this->validateOnly($fields,[
        'nombre'=>'required',
        'slug'=>'required|unique:productos',
        'short_descripcion'=>'required',
        'descripcion'=>'required',
        'precio_venta'=>'required|numeric',
        'precio_descuento'=>'numeric',
        'SKU'=>'required',
        'stock_estado'=>'required',
        'cantidad'=>'required|numeric',
        'categoria_id'=>'required'
    ]);
    if ($this->newimagen) {
        $this->validateOnly($fields,[
        'newimagen'=>'required|mimes:jpeg,png',
        ]);
    }

}

    public function updateProduct()
    {
        $this->validate([
            'nombre'=>'required',
            'slug'=>'required',
            'short_descripcion'=>'required',
            'descripcion'=>'required',
            'precio_venta'=>'required|numeric',
            'precio_descuento'=>'numeric',
            'SKU'=>'required',
            'stock_estado'=>'required',
            'cantidad'=>'required|numeric',
            'categoria_id'=>'required'
        ]);
        if ($this->newimagen) {
            $this->validate([
            'newimagen'=>'required|mimes:jpeg,png',
            ]);
        }

        $product = Producto::find($this->product_id);
        $product->nombre = $this->nombre;
        $product->slug = $this->slug;
        $product->short_descripcion = $this->short_descripcion;
        $product->descripcion = $this->descripcion;
        $product->precio_venta = $this->precio_venta;
        $product->precio_descuento = $this->precio_descuento;
        $product->precio_mayorista = $this->precio_mayorista;
        $product->SKU = $this->SKU;
        $product->stock_estado = $this->stock_estado;
        $product->cantidad = $this->cantidad;
        if ($this->newimagen)
        {
            unlink('assets/images/products/'.'/'.$product->imagen);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimagen->extension();
            $this->newimagen->storeAs('products',$imageName);
            $product->imagen = $imageName;
        }
        if ($this->newimagenes)
        {
            if ($product->imagenes)
            {
                $imagenes = explode(",",$product->imagenes);
                foreach($imagenes as $image)
                {
                    if ($image) {
                        unlink('assets/images/products/'.'/'.$image);
                    }
                }
            }
            $imagesname ='';
            foreach ($this->newimagenes as $key => $image) {
                $imgName = Carbon::now()->timestamp. $key. '.' . $image->extension();
                $image->storeAs('products',$imgName);
                $imagesname= $imagesname . ',' . $imgName;
            }
            $product->imagenes = $imagesname;
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
