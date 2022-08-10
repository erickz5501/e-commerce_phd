<div>
    <div class="container" style="padding: 30px 0;"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Agregar Producto
                        </div>
                        <div class="col-md-6">
                            <a href="{{'admin.products'}}" class="btn btn-success pull-right">Agregar Productos</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nombre del Producto</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese nombre del Producto" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Slug del producto</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese el Slug" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pequrña descripción</label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="" placeholder="Ingresar una pequeña descripción"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="" placeholder="Ingresar la descripción del producto"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio de venta</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese el precio de venta" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio de Mayorista</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese el precio para mayoristas" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">SKU</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Ingrese el SKU" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Stock</label>
                            <div class="col-md-4">
                                <select class="form-control">
                                    <option value="enstock">En-Stock</option>
                                    <option value="sinstock">Sin-stock</option>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Imagen del producto</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Categoria</label>
                            <div class="col-md-4">
                                <select class="form-control">
                                    <option value="enstock">Seleccionar Categoria</option>
                                    @foreach ($categorias as $categoria )
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
