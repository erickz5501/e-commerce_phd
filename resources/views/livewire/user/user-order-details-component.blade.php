<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md">
                @if (Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Detalle del pedido
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.orders')}}" class="btn btn-success pull-right" style="margin-left: 10px">Mis ordenes</a>
                               @if ($order->status!='canceled')
                                    <a href="" wire:click.prevent="cancelOrder" class="btn btn-warning pull-right">Cancelar pedido</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <th>Order ID</th>
                            <td>{{$order->id}}</td>
                            <th>Order Date</th>
                            <td>{{$order->created_at}}</td>
                            <th>Status</th>
                            <td>{{$order->status}}</td>
                            @if ($order->status=='delivered')
                                <th>Delivery Date</th>
                                <td>{{$order->delivered_date}}</td>
                            @elseif ($order->status=='canceled')
                            <th>Canceled Date</th>
                            <td>{{$order->canceled_date}}</td>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Articulos Pedidos
                    </div>
                    <div class="panel-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Nombre producto</h3>
                            <ul class="products-cart">
                                @foreach ($order->orderItems as $item )
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{asset('assets/images/products')}}/{{$item->product->imagen}}" alt="{{$item->product->nombre}}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->nombre}}</a>
                                        </div>
                                        <div class="price-field produtc-price"><p class="price">S/ {{$item->price}}</p></div>
                                        <div class="quantity">
                                            <h5>{{$item->quantity}}</h5>
                                        </div>
                                        <div class="price-field sub-total"><p class="price">S/ {{$item->price * $item->quantity}}</p></div>
                                        @if ($order->status == 'delivered' && $item->rstatus == false)
                                            <div class="price-field sub-total"><p class="price"><a href="{{route('user.review',['order_item_id'=>$item->id])}}">Escriba una reseña</a></p></div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Sub Total</span><b class="index">S/ {{$order->subtotal}}</b></p>
                                <p class="summary-info"><span class="title">TAX</span><b class="index">S/ {{$order->tax}}</b></p>
                                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                <p class="summary-info"><span class="title">Total</span><b class="index">S/ {{$order->total}}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Items comprados
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Nombres:</th>
                                <td>{{$order->firstname}}</td>
                                <th>Apellidos:</th>
                                <td>{{$order->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Numero 1:</th>
                                <td>{{$order->mobile1}}</td>
                                <th>Numero 2:</th>
                                <td>{{$order->mobile2}}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{$order->email}}</td>
                                <th>Departamento:</th>
                                <td>{{$order->departament}}</td>
                            </tr>
                            <tr>
                                <th>Provincia:</th>
                                <td>{{$order->province}}</td>
                                <th>Distrito:</th>
                                <td>{{$order->district}}</td>
                            </tr>
                            <tr>
                                <th>Direccion:</th>
                                <td>{{$order->address}}</td>
                                <th>Referencia:</th>
                                <td>{{$order->reference}}</td>
                            </tr>
                            <tr>
                                <th>Codigo postal:</th>
                                <td>{{$order->zipcode}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($order->is_shipping_different)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Items comprados
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Nombres:</th>
                                <td>{{$order->shipping->firstname}}</td>
                                <th>Apellidos:</th>
                                <td>{{$order->shipping->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Numero 1:</th>
                                <td>{{$order->shipping->mobile1}}</td>
                                <th>Numero 2:</th>
                                <td>{{$order->shipping->mobile2}}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{$order->shipping->email}}</td>
                                <th>Departamento:</th>
                                <td>{{$order->shipping->departament}}</td>
                            </tr>
                            <tr>
                                <th>Provincia:</th>
                                <td>{{$order->shipping->province}}</td>
                                <th>Distrito:</th>
                                <td>{{$order->shipping->district}}</td>
                            </tr>
                            <tr>
                                <th>Direccion:</th>
                                <td>{{$order->shipping->address}}</td>
                                <th>Referencia:</th>
                                <td>{{$order->shipping->reference}}</td>
                            </tr>
                            <tr>
                                <th>Codigo postal:</th>
                                <td>{{$order->shipping->zipcode}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pago
                    </div>
                    <div class="panel-body">
                        <table class="table" >
                            <tr>
                                <th>Tipo de transacción</th>
                                <td>{{$order->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>Fecha de transacción</th>
                                <td>{{$order->transaction->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
