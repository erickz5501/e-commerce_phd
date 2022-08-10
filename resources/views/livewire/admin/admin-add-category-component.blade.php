<div>
    <div class="container" style="padding: 30px 0 ">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Añadir nueva categoria
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">Todas las categorias</a>
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
                    <form class="form-horizontal" wire:submit.prevent="storeCategory" >
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Nombre categoria</label>
                            <div class="col-md-4">
                                 <input type="text" class="form-control" placeholder="Nombre de categoria" wire:model="name" wire:keyup="generateSlug" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Nombre SLUG</label>
                            <div class="col-md-4">
                                 <input type="text" class="form-control" placeholder="Nombre de slug" wire:model="slug" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary" >Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
