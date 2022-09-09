<div>
    <div class="container" style="padding:30px 0;">
        <style>
            nav svg{
                height: 20 px;
            }
            nav .hidden{
                display: block !important;
            }
        </style>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Mensajes
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
                                    <th>Email</th>
                                    <th>Celular</th>
                                    <th>Comentario</th>
                                    <th>Created at</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{$contact->id}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->comment}}</td>
                                        <td>{{$contact->created_at}}</td>
                                        {{-- <td>
                                            <a href="{{ route('admin.editcategories', ['category_slug' => $categoria->slug]) }}">
                                                <i class="fa fa-edit fa-2x" ></i>
                                            </a>
                                            <a href="#" wire:click.prevent="deleteCategory({{$categoria->id}})" style="margin-left: 10px;" >
                                                <i class="fa fa-times fa-2x text-danger"></i>
                                            </a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$contacts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
