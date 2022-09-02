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
                        Ordenes
                    </div>

                    <div class="panel-body">
                        @if (Session::has('order_message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('order_message')}}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Sub Total</th>
                                    <th>Descuento</th>
                                    <th>IGV</th>
                                    <th>Total</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Celular 1</th>
                                    <th>Correo</th>
                                    <th>ZIP</th>
                                    <th>Estado</th>
                                    <th>Fecha de compra</th>
                                    <th colspan="2" class="text-center" >Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>S/ {{$order->subtotal}}</td>
                                        <td>S/ {{$order->discount}}</td>
                                        <td>S/ {{$order->tax}}</td>
                                        <td>S/ {{$order->total}}</td>
                                        <td>{{$order->firstname}}</td>
                                        <td>{{$order->lastname}}</td>
                                        <td>{{$order->mobile1}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->zipcode}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Detalles </a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown" type="button" data-toggle="dropdown">Estado
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" >
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')" >Delivery</a></li>
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')" >Cancelado</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
