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
                                Productos
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Nuevo Producto</a>
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
                                    <th>imagen</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Precio descuento</th>
                                    <th>Precio mayorista</th>
                                    <th>Categoria</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{$producto->id}}</td>
                                        <td align="center"><img src="{{asset('assets/images/products')}}/{{$producto->imagen}}" width="60"></td>
                                        <td>{{$producto->nombre}}</td>
                                        <td align="center" >
                                            <span class="label {{$producto->stock_estado == 'enstock' ? 'label-success' : 'label-danger'}} text-uppercase">{{$producto->stock_estado}}</span>
                                            </td>
                                        <td>S/{{$producto->precio_venta}}</td>
                                        <td>S/{{$producto->precio_descuento}}</td>
                                        <td>S/{{$producto->precio_mayorista}}</td>
                                        <td>{{$producto->category->nombre}}</td>
                                        <td>
                                            <a href="{{route('admin.editproduct',['product_slug'=>$producto->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>

                                            <a href="javascript:void(0)" onclick="Confirm('{{$producto->id}}')" style="margin-left: 10px;" ><i class="fa fa-times fa-2x text-danger"></i>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        {{$productos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function Confirm(id)
    {
        const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Estas seguro de Eliminar?',
  text: "No podrás revertir esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Eliminar',
  cancelButtonText: 'Cancelar',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    window.livewire.emit('deleteRow', id)
    swalWithBootstrapButtons.fire(
      'Eliminado!',
      'Registro eliminado',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'Tu registro esta a salvo :)',
      'error'
    )
  }
})
    }


</script>
@endpush
