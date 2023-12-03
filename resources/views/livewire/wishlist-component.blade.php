<main id="main" class="main-site left-sidebar">
     
		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
					<li class="item-link"><span>wishliste</span></li>
				</ul>
			</div>
            <div class="row">



    

    <div class="wrap-shop-control">
    

                    <h1 class="shop-title">Wishlist Products</h1>
                </div>
            <div class="product product-style-3 equal-elem ">
            @if(Cart::instance('wishlist')->count() > 0)

            <div class="row">
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
            <ul class="product-list grid-products equal-container">
            @php
            $witems = Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach(Cart::instance('wishlist')->content() as $product)
            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">

            <div class="product product-style-3 equal-elem ">

            <div class="product-thumnail">
            <a href="{{route('product.details',['slug'=>$product->model->slug])}}" title="{{$product->model->name}}">
                <figure><img src="{{asset('assets/images/products')}}/{{$product->model->image}}"  alt="{{$product->model->name}}"></figure>
            </a>
            </div>
            <div class="product-info">
            <a href="#" class="product-name"><span>{{$product->model->name}}</span></a>
            <div class="wrap-price"><span class="product-price">{{$product->model->regular_price}}</span></div>
            <a href="#" class="btn add-to-cart"  wire:click.prevent="movetocart('{{$product->rowId}}')" >Move To Cart</a>
            <div class="product-wish">
                @if($witems->contains($product->model->id))
                <a href="" wire:click.prevent="deleteFromWishlist({{$product->model->id}})" ><i class="fa fa-heart fill-heart"></i></a>
                @else
                <a href="" wire:click.prevent="addToWishlist({{$product->model->id}},'{{$product->model->name}}',{{$product->model->regular_price}})"><i class="fa fa-heart "></i></a>
                @endif
            </div>
            </div>

            </div>

            </li>
            @endforeach

            </ul>

            </div>
            </div>

                    </div>
                    @else
                    <div class="text-center" style="padding:40px 0 40px 0;" >
            <h1 > No Items In Your wishlist !!! </h1>
            <p> Check Our Products  </p>
            <a href="/shop"  class=" btn btn-primary" >Shop Now</a>
            @endif
    </div>
</main>
			