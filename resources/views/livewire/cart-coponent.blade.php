<main id="main" class="main-site">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Cart</span></li>
        </ul>
    </div>
    <div class=" main-content-area">
      
        <div class="wrap-iten-in-cart">
            
            @if(Cart::instance('cart')->count() > 0)
            <a class="btn btn-danger pull-right" href="#" wire:click.prevent="deleteall()">Clear Shopping Cart</a>
            <h3 class="box-title">Products Name</h3>
            
            <ul class="products-cart ">
                @foreach(Cart::instance('cart')->content() as $item)
                <li class="pr-cart-item">
                    <div class="product-image">
                        <figure><img src="{{asset('assets/images/products/digital_18.jpg')}}" alt=""></figure>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="#">{{$item->model->name}}</a>
                    </div>
                    <div class="price-field produtc-price"><p class="price">{{$item->model->regular_price}}</p></div>
                    <div class="quantity">
                        <div class="quantity-input">
                            <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >									
                            <a class="btn btn-increase" href="#" wire:click.prevent="acqtt('{{$item->rowId}}')"></a>
                            <a class="btn btn-reduce" href="#" wire:click.prevent="decqtt('{{$item->rowId}}')"></a>
                        </div>
                    </div>
                    <div class="price-field sub-total"><p class="price">{{$item->subtotal}} DH</p></div>
                    <div class="delete">
                        <a href="#" wire:click.prevent="deleteitem('{{$item->rowId}}')" class="btn btn-delete" title="">
                            <span>Delete from your cart</span>
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                </li>
                @endforeach											
            </ul>
            <div class="summary">
            <div class="order-summary">
                <p class="summary-info total-info"><span class="title">Shipping   </span><b class="index">Free Shipping</b></p>
                <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{Cart::instance('cart')->subtotal()}} DH </b></p>
            </div>
            <div class="checkout-info">
                
                <a class="btn btn-checkout" href="" wire:click.prevent="checkout">Check out</a>
                <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>
            <div class="update-clear">
                <a class="btn btn-update" href="#">Update Shopping Cart</a>
            </div>
        </div>
            @else
            <div class="text-center" style="padding:40px 0 40px 0;" >
            <h1 > No Items In Your Cart !!! </h1>
            <p> Check Our Products  </p>
            <a href="/shop"  class=" btn btn-primary" >Shop Now</a>
             @endif
        </div>


        <div class="wrap-show-advance-info-box style-1 box-in-site">
            <h3 class="title-box">Most Viewed Products</h3>
           
            <div class="wrap-products">
                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                @foreach($latestproducts as $lpro)
                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{asset('assets/images/products')}}/{{$lpro->image}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
                            <div class="wrap-price"><span class="product-price">{{$lpro->regular_price}} DH</span></div>
                        </div>
                    </div>
                    
            @endforeach
                </div>
            </div>
        </div>

    </div><!--end main content area-->
</div>
</main>