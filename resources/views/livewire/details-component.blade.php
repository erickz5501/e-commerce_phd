	<main id="main" class="main-site">

        <style>
             .regprice{
                font-weight: 300;
                font-size: 13px !important;
                color: #aaaaaa !important;
                text-decoration: line-through;
                padding-left: 10px;
             }
        </style>

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>detail</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="wrap-product-detail">
						<div class="detail-media">
							<div class="product-gallery">
							  <ul class="slides">
							        <li data-thumb="{{asset('assets/images/products')}}/{{$productos->imagen}}">
							    	<img src="{{asset('assets/images/products')}}/{{$productos->imagen}}" alt="{{$productos->nombre}}" />
							    </li>
                                @php
                                    $imagenes = explode(",",$productos->imagenes)
                                @endphp
                                @foreach ($imagenes as $images)
                                    @if ($images)
                                        <li data-thumb="{{asset('assets/images/products')}}/{{$images}}">
                                        <img src="{{asset('assets/images/products')}}/{{$images}}" alt="{{$productos->nombre}}" />
                                    @endif
                                @endforeach
							  </ul>
							</div>
						</div>
                        <div class="detail-info">
							<div class="product-rating">
                                <style>
                                    .color-gray{
                                        color: #e6e6e6 !important;
                                    }
                                </style>
                                @php
                                    $promedio = 1;
                                @endphp
                                @foreach ($productos->orderItems->where('rstatus',1) as $orderItem)
                                    @php
                                        $promedio = $promedio * $orderItem->review->rating;

                                    @endphp
                                @endforeach
                                @for ($i=1;$i<=5;$i++)
                                    @if ($i<=$promedio)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    @endif
                                @endfor
                                <a href="#" class="count-review">({{$productos->orderItems->where('rstatus',1)->count()}} Valoración)</a>
                            </div>
                            <h2 class="product-name">{{$productos->nombre}}</h2>
                            <div class="short-desc">
                                {!!$productos->short_descripcion!!}
                            </div>
                            @if ($productos->precio_descuento > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                <div class="wrap-price">
                                    <span class="product-price">S/{{$product->precio_descuento}}</span>
                                    <del>
                                        <span class="product-price regprice">S/{{$productos->precio_venta}}</span>
                                    </del>
                                </div>
                            @else
                                <div class="wrap-price"><span class="product-price">S/{{$productos->precio_venta}}</span></div>
                            @endif
                            <div class="stock-info in-stock">
                                <p class="availability">Disponibles: <b>{{$productos->cantidad}}</b></p>
                            </div>
                            <div class="quantity">
                                <span>Cantidad:</span>
								<div class="quantity-input">
									<input type="text" name="product-quatity" wire:model="qty" data-max="120" pattern="[0-9]*" >

									<a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity" ></a>
									<a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity" ></a>
								</div>
							</div>
							<div class="wrap-butons">
                                @if ($productos->precio_descuento > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$productos->id}}, '{{$productos->nombre}}', {{$productos->precio_descuento}})" >Añadir al carro</a>

                                @else
								    <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$productos->id}}, '{{$productos->nombre}}', {{$productos->precio_venta}})" >Añadir al carro</a>
                                @endif
                                <div class="wrap-btn">
                                    <a href="#" class="btn btn-compare">Add Compare</a>
                                    <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                                </div>
							</div>
						</div>
						<div class="advance-info">
							<div class="tab-control normal">
								<a href="#description" class="tab-control-item active">Descripción</a>
								<a href="#add_infomation" class="tab-control-item">Información adicional</a>
								<a href="#review" class="tab-control-item">Reviews</a>
							</div>
							<div class="tab-contents">
								<div class="tab-content-item active" id="description">
									{!!$productos->descripcion!!}
								</div>
								<div class="tab-content-item " id="add_infomation">
									<table class="shop_attributes">
										<tbody>
											<tr>
												<th>Weight</th><td class="product_weight">1 kg</td>
											</tr>
											<tr>
												<th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
											</tr>
											<tr>
												<th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="tab-content-item " id="review">

									<div class="wrap-review-form">
                                        <style>
                                            .width-0-percent{
                                                width: 0%;
                                            }
                                            .width-20-percent{
                                                width: 20%;
                                            }
                                            .width-40-percent{
                                                width: 40%;
                                            }
                                            .width-60-percent{
                                                width: 60%;
                                            }
                                            .width-80-percent{
                                                width: 80%;
                                            }
                                            .width-100-percent{
                                                width: 100%;
                                            }
                                        </style>

										<div id="comments">
											<h2 class="woocommerce-Reviews-title">{{$productos->orderItems->where('rstatus',1)->count()}} Reseña de <span>{{$productos->nombre}}</span></h2>
											<ol class="commentlist">
                                                @foreach ( $productos->orderItems->where('rstatus',1) as $orderItem )

												<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
													<div id="comment-20" class="comment_container">
														<img alt="" src="{{asset('assets/images/author-avata.jpg')}}" height="80" width="80">
														<div class="comment-text">
															<div class="star-rating">
																<span class="width-{{$orderItem->review->rating * 20}}-percent">Rated <strong class="rating">{{$orderItem->review->rating}}</strong> out of 5</span>
															</div>
															<p class="meta">
																<strong class="woocommerce-review__author">{{$orderItem->order->user->name}}</strong>
																<span class="woocommerce-review__dash">–</span>
																<time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}}</time>
															</p>
															<div class="description">
																<p>{{$orderItem->review->comment}}</p>
															</div>
														</div>
													</div>
												</li>
                                                @endforeach
											</ol>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget widget-our-services ">
						<div class="widget-content">
							<ul class="our-services">

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Free Shipping</b>
											<span class="subtitle">On Oder Over $99</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-gift" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Special Offer</b>
											<span class="subtitle">Get a gift!</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-reply" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Order Return</b>
											<span class="subtitle">Return within 7 days</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div><!-- Categories widget-->

					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Popular Products</h2>
						<div class="widget-content">
							<ul class="products">
                                @foreach ($popular_products as $popular_product)
								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="{{route('product.details',['slug'=>$popular_product->slug])}}" title="{{$popular_product->nombre}}">
												<figure><img src="{{asset('assets/images/products')}}/{{$popular_product->imagen}}" alt="{{$popular_product->nombre}}"></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="{{route('product.details',['slug'=>$popular_product->slug])}}" title="{{$popular_product->nombre}} class="product-name"><span>{{$popular_product->nombre}}</span></a>
											<div class="wrap-price"><span class="product-price">S/{{$productos->precio_venta}} - $250</span></div>
										</div>
									</div>
								</li>
                                @endforeach
							</ul>
						</div>
					</div>

				</div><!--end sitebar-->

				<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box">Related Products</h3>
						<div class="wrap-products">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                                @foreach ($related_products as $related_product )


								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="{{route('product.details',['slug'=>$related_product->slug])}}" title="{{$related_product->nombre}}">
											<figure><img src="{{asset('assets/images/products')}}/{{$related_product->imagen}}" width="214" height="214" alt="{{$popular_product->nombre}}"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">Nuevos</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">Vista rapida</a>
										</div>
									</div>
									<div class="product-info">
										<a href="{{route('product.details',['slug'=>$related_product->slug])}}" class="product-name"><span>{{$related_product->nombre}}</span></a>
										<div class="wrap-price"><span class="product-price">S/{{$productos->precio_venta}} - $250</span></div>
									</div>
								</div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</main>
