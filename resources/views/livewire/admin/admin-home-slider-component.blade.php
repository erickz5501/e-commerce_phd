<div>
    <div class="container" style="padding: 30 px 0;" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Todos los Slides
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addhomeslider') }}" class="btn btn-success pull-right">Añadir</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Imagen</th>
                                    <th>Titulo</th>
                                    <th>Sub titulo</th>
                                    <th>Precio</th>
                                    <th>Link</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td> <img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="120"> </td>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->subtitle}}</td>
                                        <td>{{$slider->price}}</td>
                                        <td>{{$slider->link}}</td>
                                        <td>{{$slider->status}}</td>
                                        <td>{{$slider->created_at}}</td>
                                        <td>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
