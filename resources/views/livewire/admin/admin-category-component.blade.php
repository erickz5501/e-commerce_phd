<div>
    <style>
        nav svg{
            height: 20 px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Categorias
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcategories') }}" class="btn btn-success pull-right">Añanir</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message')}}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{$categoria->id}}</td>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->slug}}</td>
                                        <td>
                                            <a href="{{ route('admin.editcategories', ['category_slug' => $categoria->slug]) }}">
                                                <i class="fa fa-edit fa-2x" ></i>
                                            </a>
                                            <a href="#" wire:click.prevent="deleteCategory({{$categoria->id}})" style="margin-left: 10px;" >
                                                <i class="fa fa-times fa-2x text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categorias->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
