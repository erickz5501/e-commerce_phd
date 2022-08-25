<div>
    <div class="container" style="padding: 30px 0 ">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Editar Cupón
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">Todas los Cupones</a>
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
                    <form class="form-horizontal" wire:submit.prevent="updateCoupon" >
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">codigo del cupón</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="codigo del Cupón" wire:model="code">
                                @error('code') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Tipo de cupón</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="type">
                                    <option value="">Seleccionar</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="percent">Porcentaje</option>
                                </select>
                                @error('type') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Valor del cupón</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Ingrese el valor" wire:model="value" >
                                @error('value') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Valor en el carrito</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Ingrese el valor" wire:model="cart_value" >
                                @error('cart_value') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Fecha de expiración</label>
                            <div class="col-md-4">
                                <input type="text" id="expiry-date" class="form-control" class="form-control input-md" placeholder="Ingrese la fecha" wire:model="expiry_date" >
                                @error('expiry_date') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary" >Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function()
    {
        $('#expiry-date').datetimepicker({
        format: 'Y-MM-DD h:m:s',
        })
        .on('dp.change',function(ev){
            var data = $('#expiry-date').val();
            @this.set('expiry_date', data);
        });
    });

</script>
@endpush
