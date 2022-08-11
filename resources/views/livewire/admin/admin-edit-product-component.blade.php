<div>
    <div class="container" style="padding: 30px 0 ">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Añadir producto
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">Todas las productos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Nombre del Producto</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese nombre del Producto" class="form-control input-md" wire:model="nombre" wire:keyup="generateSlug">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Slug del producto</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese el Slug" class="form-control input-md" wire:model="slug">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pequeña descripción</label>
                            <div class="col-md-4">
                                <textarea class="form-control" wire:model="short_descripcion" placeholder="Ingresar una pequeña descripción"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-4">
                                <textarea class="form-control" wire:model="descripcion" placeholder="Ingresar la descripción del producto"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio de venta</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese el precio de venta" class="form-control input-md" wire:model="precio_venta">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio de Mayorista</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese el precio para mayoristas" wire:model="precio_descuento" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">SKU</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese el SKU" wire:model="SKU" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Stock</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="stock_estado">
                                    <option value="enstock">En-Stock</option>
                                    <option value="sinstock">Sin-stock</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cantidad</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese la cantidad de productos" wire:model="cantidad" class="form-control input-md" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" >Imagen</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file" wire:model="newimagen"/>
                                @if ($newimagen)
                                    <img src="{{$newimagen->temporaryUrl()}}" width="120" />
                                @else
                                    <img src="{{asset('assets/images/products')}}/{{$imagen}}" width="120" />
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Categoria</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="categoria_id">
                                    <option value="enstock">Seleccionar Categoria</option>
                                    @foreach ($categorias as $categoria )
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
