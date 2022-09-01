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
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message')}}
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
                                        {{-- <td>
                                            <a href="{{route('admin.editproduct',['product_slug'=>$producto->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>

                                            <a href="javascript:void(0)" onclick="Confirm('{{$producto->id}}')" style="margin-left: 10px;" ><i class="fa fa-times fa-2x text-danger"></i>
                                        </td> --}}
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
