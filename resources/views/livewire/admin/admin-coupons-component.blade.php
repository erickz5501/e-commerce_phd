<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Todos los cupones
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcoupon') }}" class="btn btn-success pull-right">Añanir</a>
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
                                    <th>Codigo</th>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Valor en el Carrito</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{$coupon->id}}</td>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->type}}</td>
                                        @if ($coupon->type == 'fixed')
                                            <td>S/{{$coupon->value}}</td>
                                        @else
                                            <td>{{$coupon->value}}%</td>
                                        @endif
                                        <td>{{$coupon->cart_value}}</td>
                                        <td>
                                            <a href="{{ route('admin.editcoupon', ['coupon_id' => $coupon->id]) }}">
                                                <i class="fa fa-edit fa-2x" ></i>
                                            </a>
                                            <a href="#" onclick="Confirm('{{$coupon->id}}')" style="margin-left: 10px;" >
                                                <i class="fa fa-times fa-2x text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$coupons->links()}}
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
