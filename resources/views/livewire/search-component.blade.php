<main id="main" class="main-site left-sidebar">
     
		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>shop</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="{{asset('assets/images/shop-banner.jpg')}}" alt=""></figure>
						</a>
					</div>

					<div class="wrap-shop-control">

						<h1 class="shop-title"></h1>
					</div><!--end wrap shop control-->
					<style>
						.product-wish{
						    position:absolute; 
							z-index = 99; 
							right:30px; 
							text-align:right;
							top:10%;	
						}
						.product-wish .fa{
							color:#cbcbcb;
							font-size:32px;
						}
						.product-wish .fa:hover{
							color:red;
							
						}
						.fill-heart{
							color:red !important;
						}
					</style>
                      @if($products->count()>0)
					<div class="row">

						<ul class="product-list grid-products equal-container">
							@php
							  $witems = Cart::instance('wishlist')->content()->pluck('id');
							@endphp
						@foreach($products as $product)
							<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
							
								<div class="product product-style-3 equal-elem ">
									
									<div class="product-thumnail">
										<a href="{{route('product.details',['slug'=>$product->slug])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>{{$product->name}}</span></a>
										<div class="wrap-price"><span class="product-price">{{$product->regular_price}}</span></div>
										<a href="#" class="btn add-to-cart"  wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})" >Add To Cart</a>
										<div class="product-wish">
											@if($witems->contains($product->id))
											<a href="" wire:click.prevent="deleteFromWishlist({{$product->id}})" ><i class="fa fa-heart fill-heart"></i></a>
											@else
											<a href="" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fa fa-heart "></i></a>
											@endif
										</div>
									</div>
									
								</div>
								
							</li>
							@endforeach
 
						</ul>

					</div>
                     @else
                     <p>No Products</p>
                     @endif
					<div class="wrap-pagination-info">
						<ul class="page-numbers">
							{{$products->links()}}
						</ul>
						<p class="result-count">Showing 1-8 of 12 result</p>
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget mercado-widget categories-widget">
						<h2 class="widget-title">All Categories</h2>
						<div class="widget-content">
							<ul class="list-category">
								@foreach($categories as $categorie)
								<li class="category-item">
									<a href="{{route('product.categorie',['categorie_slug'=>$categorie->slug])}}" class="cate-link">{{$categorie->name}}</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div><!-- Categories widget-->

					<div class="widget mercado-widget filter-widget brand-widget">
						<h2 class="widget-title">Brand</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list list-limited" data-show="6">
								<li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
								<li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
								<li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
								<li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
								<li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
								<li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
								<li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div><!-- brand widget-->

					<div class="widget mercado-widget filter-widget price-filter">
						<h2 class="widget-title">Price<span class="text-info"> {{$min_price}} - {{$max_price}} DH  </span></h2>
						<div class="widget-content" style="padding:10px 5px 40px 5px;">
						<div id="slider" wire:ignore></div>
							
						</div>
					</div>

							</ul>
						</div>
					</div>
					<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">						
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
								@foreach($latestproducts as $lpro)
									<div class="product product-style-2 equal-elem ">
										
										<div class="product-thumnail">
											<a href="{{route('product.details',['slug'=>$lpro->slug])}}" title="{{$lpro->name}}">
												<figure><img src="{{asset('assets/images/products/kidtoy_05.jpg')}}" width="800" height="800" alt="{{$lpro->name}}"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$lpro->name}}</span></a>
											<div class="wrap-price"><span class="product-price">{{$lpro->regular_price}}</span></div>
										</div>
										
									</div>
									@endforeach

								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>

				</div><!--end sitebar-->
				
			</div><!--end row-->
			

		</div><!--end container-->

	</main>
	@push('scripts')
	
	<script>
		var slider = document.getElementById('slider')
		noUiSlider.create(slider,{

			start : [1,1000],
			connect : true,
			range : {
			'min' : 1,
			'max' : 1000

			},
			pips : {
				mode: 'steps',
				stepped:true,
				density:4
			}
		});

		slider.noUiSlider.on('update',function(value){
			@this.set('min_price',value[0]);
			@this.set('max_price',value[1]);
		});
	</script>
	
	@endpush