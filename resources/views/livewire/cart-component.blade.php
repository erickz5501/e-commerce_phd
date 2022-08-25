	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Carrito</span></li>
				</ul>
			</div>
			<div class=" main-content-area">

				<div class="wrap-iten-in-cart">
                    @if (Session::has('success_mesage'))
                        <div class="alert alert-success">
                            <strong>Success</strong> {{Session::get('success_mesage')}}
                        </div>
                    @endif
                    @if (Cart::instance('cart')->count() > 0)
                        <h3 class="box-title">Nombre producto</h3>
                        <ul class="products-cart">
                            @foreach (Cart::instance('cart')->content() as $item )
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{('assets/images/products')}}/{{$item->model->imagen}}" alt="{{$item->model->nombre}}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->nombre}}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">S/ {{$item->model->precio_venta}}</p></div>
                                    <div class="quantity">
                                        <div class="quantity-input">
                                            <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
                                            <a class="btn btn-increase" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                            <a class="btn btn-reduce"  wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                                        </div>
                                        <p class="text-center"><a href="#" wire:click.prevent="switchToSaveForLater('{{$item->rowId}}')" >Guardar para despues</a></p>
                                    </div>
                                    <div class="price-field sub-total"><p class="price">S/ {{$item->subtotal}}</p></div>
                                    <div class="delete">
                                        <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="btn btn-delete" title="">
                                            <span>Eliminar del carrito</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No ahí productos en el carrito.</p>
                    @endif
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Subtotal</span><b class="index">S/ {{Cart::instance('cart')->subtotal()}}</b></p>
                        @if (Session::has('coupon'))
                            <p class="summary-info"><span class="title">Descuento ({{Session::get('coupon')['code']}}) <a href="#" wire:click.prevent="removeCoupon"> <i class="fa fa-times text-danger"></i></a></span></span><b class="index"> -S/{{number_format($discount,2)}}</b></p>
                            <p class="summary-info"><span class="title">Subtotal con Descuento</span></span><b class="index">S/{{number_format($subTotalAfterDiscount,2)}}</b></p>
                            <p class="summary-info"><span class="title">Tax ({{config('cart.tax')}}%)</span></span><b class="index">S/{{number_format($taxlAfterDiscount,2)}}</b></p>
                            <p class="summary-info"><span class="title">Total</span><b class="index">S/{{number_format($totalAfterDiscount,2)}}</b></p>

						@else
                            <p class="summary-info"><span class="title">Tax</span><b class="index">S/ {{Cart::instance('cart')->tax()}}</b></p>
                            <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">S/ {{Cart::instance('cart')->total()}}</b></p>
					@endif
                    </div>
					    <div class="checkout-info">
                        @if (!Session::has('coupon'))
						<label class="checkbox-field">
							<input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCouponCode"><span>Tengo un código promocional</span>
						</label>
                        @if ($haveCouponCode == 1)
                            <div class="summary-item">
                                <form wire:submit.prevent="applyCouponCode">
                                    <h4 class="title-box">Código del cupón</h4>
                                    @if (Session::has('coupon_message'))
                                        <div class="alert alert-danger" role="danger">{{Session::get('coupon_message')}}</div>
                                    @endif
                                    <p class="row-in-form">
                                        <input type="text" placeholder="Ingrese el código del cupón" name="coupon-code" wire:model="couponCode"/>
                                    </p>
                                    <button type="submit" class="btn btn-small">Aplicar</button>
                                </form>
                            </div>
                        @endif
                    @endif

						<a class="btn btn-checkout" href="checkout.html">Check out</a>
						<a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="update-clear">
						<a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()" >Clear Shopping Cart</a>
						<a class="btn btn-update" href="#">Update Shopping Cart</a>
					</div>
				</div>

                <div class="wrap-iten-in-cart">
                    <h3 class="title-box" style="border-bottom: 1px solid; padding-bottom:15px;">{{Cart::instance('saveForLater')->count()}} items guardado para despues</h3>
                    @if (Session::has('s_success_message'))
                        <div class="alert alert-success">
                            <strong>Success</strong> {{Session::get('s_success_message')}}
                        </div>
                    @endif
                    @if (Cart::instance('saveForLater')->count() > 0)
                        <h3 class="box-title">Nombre producto</h3>
                        <ul class="products-cart">
                            @foreach (Cart::instance('saveForLater')->content() as $item )
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{('assets/images/products')}}/{{$item->model->imagen}}" alt="{{$item->model->nombre}}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->nombre}}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">S/ {{$item->model->precio_venta}}</p></div>
                                    <div class="quantity">
                                        <p class="text-center"><a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')" >Mover al carrito</a></p>
                                    </div>
                                    <div class="delete">
                                        <a href="#" wire:click.prevent="deleteFromSaveForLater('{{$item->rowId}}')" class="btn btn-delete" title="">
                                            <span>Eliminar del guardado para despues</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No ahí productos.</p>
                    @endif
				</div>

				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{('assets/images/products/digital_04.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{('assets/images/products/digital_17.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{('assets/images/products/digital_15.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{('assets/images/products/digital_01.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{('assets/images/products/digital_21.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{('assets/images/products/digital_03.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{('assets/images/products/digital_04.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{('assets/images/products/digital_05.jpg')}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>
						</div>
					</div><!--End wrap-products-->
				</div>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
