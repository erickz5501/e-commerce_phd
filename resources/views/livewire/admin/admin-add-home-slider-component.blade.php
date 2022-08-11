<div>
    <div class="container" style="padding: 30px 0;" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Añadir la categoria
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.homeslider') }}" class="btn btn-success pull-right">Todos los slides</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" >
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Titulo</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Titulo" class="form-control input-md"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Sub titulo</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sub titulo" class="form-control input-md"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Precio</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Precio" class="form-control input-md"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Link</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Precio" class="form-control input-md"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Imagen</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Estado</label>
                                <div class="col-md-4">
                                    <select class="form-control">
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
