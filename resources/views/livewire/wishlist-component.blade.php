<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Lista de deseos</span></li>
            </ul>
        </div>
        <style>
            .product-wish{
                position: absolute;
                top: 10%;
                left: 0;
                z-index: 99;
                right: 30px;
                text-align: right;
                padding-top: 0;
            }
            .product-wish .fa{
                color: #cbcbcb;
                font-size: 32px;
            }
            .product-wish .fa:hover{
                color: #ff3c45;
            }
            .fill-heart{
                color: #ff3c45 !important;
            }
        </style>
        <div class="row">
            @if (Cart::instance('wishlist')->content()->count() > 0 )
            <ul class="product-list grid-products equal-container">
                @foreach (Cart::instance('wishlist')->content() as $item)
                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                    <div class="product product-style-3 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->nombre}}">
                                <figure><img src="{{asset('assets/images/products')}}/{{$item->model->imagen}}" alt="{{$item->model->nombre}}"></figure>
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="{{route('product.details', ['slug'=>$item->model->slug])}}" class="product-name"><span>{{$item->model->nombre}}</span></a>
                            <div class="wrap-price"><span class="product-price">S/ {{$item->model->precio_venta}}</span></div>
                            <a href="javascript:void(0)" class="btn add-to-cart" wire:click.prevent="store({{$item->model->id}},'{{$item->model->nombre}}',{{$item->model->precio_venta}})" >Añadir al carro</a>
                            <div class="product-wish">
                                <a href="#" wire:click.prevent="removefromWishlist({{$item->model->id}})" ><i class="fa fa-heart fill-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
                <h4>Sin productos en lista de deseos.</h4>
            @endif
        </div>
    </div>
</main>
