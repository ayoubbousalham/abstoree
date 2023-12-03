<main id="main">
		<div class="container">

			<!--MAIN SLIDE-->
			<div class="wrap-main-slide">
				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
					<div class="item-slide">
						<img src="{{asset('assets/images/main-slider-1-1.jpg')}}" alt="" class="img-slide">
						<div class="slide-info slide-1">
							<h2 class="f-title">Kid Smart <b>Watches</b></h2>
							<p class="sale-info">Only price: <span class="price">199 DH</span></p>
							<a href="/shop" class="btn-link">Shop Now</a>
						</div>
					</div>
					<div class="item-slide">
						<img src="{{asset('assets/images/main-slider-1-2.jpg')}}" alt="" class="img-slide">
						<div class="slide-info slide-2">
							<h2 class="f-title">Extra 25% Off</h2>
							<span class="f-subtitle">On online payments</span>
							<h4 class="s-title">Get Free</h4>>
						</div>
					</div>
					<div class="item-slide">
						<img src="{{asset('assets/images/main-slider-1-3.jpg')}}" alt="" class="img-slide">
						<div class="slide-info slide-3">
							<h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
							<span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
							<p class="sale-info">Stating at: <b class="price">255 DH</b></p>
							<a href="/shop" class="btn-link">Shop Now</a>
						</div>
					</div>
				</div>
			</div>

			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{asset('assets/images/home-1-banner-1.jpg')}}" alt="" width="580" height="190"></figure>
					</a>
				</div>
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{asset('assets/images/home-1-banner-2.jpg')}}" alt="" width="580" height="190"></figure>
					</a>
				</div>
			</div>

			<!--On Sale-->
		
			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{asset('assets/images/digital-electronic-banner.jpg')}}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">						
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
								@foreach($latestproducts as $lp)
									<div class="product product-style-2 equal-elem ">
										
										<div class="product-thumnail">
											<a href="{{route('product.details',['slug'=>$lp->slug])}}" title="{{$lp->name}}">
												<figure><img src="{{asset('assets/images/products')}}/{{$lp->image}}" width="800" height="800" alt="{{$lp->name}}"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$lp->name}}</span></a>
											<div class="wrap-price"><span class="product-price">{{$lp->regular_price}} DH</span></div>
										</div>
										
									</div>
									@endforeach

								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>

			

		</div>

</main>