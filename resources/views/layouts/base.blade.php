<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ABSTORE</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/brands/logo.png')}}">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-01.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css" integrity="sha512-cSe3D7ePd2MI6J8MDnEAi52LVHpaSadXU+ML3bIOZepIdDLppMDBrkKtsgLe7WFmBji+HgGeY8o8ZFe0YWbfNQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/uislider.css')}}">
	
    @livewireStyles
</head>
<body class=" detail page ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">				

				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item" >
									<a title="Hotline: (+212) 610415355" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+212) 610415355</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								@if(Route::has('login'))
								  @auth
								    @if(Auth::user()->utype === 'ADM')
								<li class="menu-item menu-item-has-children parent" >
									<a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										
										<li class="menu-item" >
											<a title="Dashboard" href="{{route('admin.dashboard')}}">Dashboard</a>
										</li>
										<li class="menu-item" >
											<a title="Categories" href="{{route('admin.categories')}}">Categories</a>
										</li>
										<li class="menu-item" >
											<a title="products" href="{{route('admin.products')}}">Products</a>
										</li>
										<li class="menu-item" >
											<a title="products" href="{{route('admin.homecategorie')}}">Home Product Categorie</a>
										</li>
										<li class="menu-item" >
											<a title="products" href="{{route('admin.sale')}}">sale seting</a>
										</li>
										<li class="menu-item" >
											<a title="logout" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
										</li>
										<form id="logout-form"  method="POST" action="{{route('logout')}}">
											@csrf
										<form>
									</ul>
								</li>
								@else
								<li class="menu-item menu-item-has-children parent" >
									<a title="My Account" href="">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										
										<li class="menu-item" >
											<a title="Dashboard" href="{{route('user.dashboard')}}">Dashboard</a>
										</li>
										<li class="menu-item" >
											<a title="logout" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										</li>
										<form id="logout-form" method="POST" action="{{route('logout')}}">
											@csrf
										<form>
									</ul>
								</li>
								@endif
								@else
								<li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
								<li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
								  
								@endif
								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="/" ><img style="height:70px;" src="{{asset('assets/images/brands/logo.png')}}" alt="ABSTORE"></a>
						</div>
                        @livewire('header-search-component')
					
                        <div class="wrap-icon right-section">
						@livewire('wishlist-count-component')
						@livewire('cart-count-component')
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">
					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="/" class="link-term mercado-item-title">About Us</a>
								</li>
								<li class="menu-item">
									<a href="/shop" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="/cart" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item">
									<a href="/checkout" class="link-term mercado-item-title">Checkout</a>
								</li>
								<li class="menu-item">
									<a href="contact-us.html" class="link-term mercado-item-title">Contact Us</a>
								</li>								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
    	{{$slot}}
	<footer id="footer">
	    <div class="wrap-footer-content footer-style-1">

	        <div class="wrap-function-info">
	            <div class="container">
	                <ul>
	                    <li class="fc-info-item">
	                        <i class="fa fa-truck" aria-hidden="true"></i>
	                        <div class="wrap-left-info">
	                            <h4 class="fc-name">Free Shipping</h4>
	                            <p class="fc-desc">Free On Oder Over $99</p>
	                        </div>

	                    </li>
	                    <li class="fc-info-item">
	                        <i class="fa fa-recycle" aria-hidden="true"></i>
	                        <div class="wrap-left-info">
	                            <h4 class="fc-name">Guarantee</h4>
	                            <p class="fc-desc">30 Days Money Back</p>
	                        </div>

	                    </li>
	                    <li class="fc-info-item">
	                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
	                        <div class="wrap-left-info">
	                            <h4 class="fc-name">Safe Payment</h4>
	                            <p class="fc-desc">Safe your online payment</p>
	                        </div>

	                    </li>
	                    <li class="fc-info-item">
	                        <i class="fa fa-life-ring" aria-hidden="true"></i>
	                        <div class="wrap-left-info">
	                            <h4 class="fc-name">Online Suport</h4>
	                            <p class="fc-desc">We Have Support 24/7</p>
	                        </div>

	                    </li>
	                </ul>
	            </div>
				<div class="coppy-right-box">
				<div class="container">
					<div class="coppy-right-item item-left">
						<p class="coppy-right-text">Copyright © 2020 BousalhamAyoub. All rights reserved</p>
					</div>
					<div class="coppy-right-item item-right">
						<div class="wrap-nav horizontal-nav">
							<ul>
								<li class="menu-item"><a href="about-us.html" class="link-term">About us</a></li>								
								<li class="menu-item"><a href="privacy-policy.html" class="link-term">Privacy Policy</a></li>
								<li class="menu-item"><a href="terms-conditions.html" class="link-term">Terms & Conditions</a></li>
								<li class="menu-item"><a href="return-policy.html" class="link-term">Return Policy</a></li>								
							</ul>
						</div>
					</div>
					
				</div>
			</div>
	        </div>
	    </div>
	</footer>

	<script src="{{asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('assets/js/functions.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/js/bootstrap-datetimepicker.min.js" integrity="sha512-JcceycVPblKG5oooLUNXGY7KhAvXxzppH+n7CFZMCb1Uj1hZzysaWaVsOukaZpb/qPL9zFGR66DDfTTxlVB5qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.min.js" integrity="sha512-mZXUH8DAODwCHioWP3gltQwa953LbABMlzTYwYkKqv8eNxOk37B1HgNNuCMfFxgrpW5C34WJbxPDcM58+s1dJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.tiny.cloud/1/833iens3hk16j7k8y35d08427e0led5mk4jmr2q843fpqhai/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<!--footer area-->
    @livewireScripts
	@stack('scripts')
</body>
</html>