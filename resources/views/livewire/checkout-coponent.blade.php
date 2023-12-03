<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Checkout</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<form wire:submit.prevent="placeOrder">
						<div class="wrap-address-billing">
							<h3 class="box-title">Billing Address</h3>
							
								<p class="row-in-form">
									<label for="fname">first name<span>*</span></label>
									<input id="fname" type="text" name="firstname" value="" placeholder="Your name" wire:model="firstname">
									@error('firstname') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="lname">last name<span>*</span></label>
									<input id="lname" type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
									@error('lastneame') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="email">Email Addreess:</label>
									<input id="email" type="email" name="email" value="" placeholder="Type your email" wire:model="email">
									@error('email') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="phone">Phone number<span>*</span></label>
									<input id="phone" type="number" name="phone" value="" placeholder="10 digits format" wire:model="phone">
									@error('phone') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="add">Line1:</label>
									<input id="add" type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1">
									@error('line1') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="add">Line2:</label>
									<input id="add" type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line2">
									@error('line2') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="country">Province<span>*</span></label>
									<input id="country" type="text" name="country" value="" placeholder="United States" wire:model="province">
									@error('province') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="country">Country<span>*</span></label>
									<input id="country" type="text" name="country" value="" placeholder="United States" wire:model="country">
									@error('country') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="zip-code">ZIP:</label>
									<input id="zip-code" type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
									@error('zipcode') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="city">City<span>*</span></label>
									<input id="city" type="text" name="city" value="" placeholder="City name" wire:model="city">
									@error('city') <p class="text-danger">{{$message}}</p> @enderror
								</p>
							
						</div>
						<div class="summary summary-checkout">
							<div class="summary-item payment-method">
								<h4 class="title-box">Payment Method</h4>
								@if($payementmethode == 'card')
								<div class="wrap-address-billing">
									@if(Session::has('stripe_error'	))
									   <div class="alert alert-danger" role="alert">{{Session::get('stipe_error')}}</div>
									@endif
								<p class="row-in-form">
									<label for="number-card">Card Number :</label>
									<input id="card_no" type="text" name="number-card" value="" placeholder="Card Number" wire:model="card_no">
									@error('NC') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="expire-month">Expire Month :</label>
									<input id="expire-month" type="text" name="expire-month" value="" placeholder="Expire Month" wire:model="exp_month">
									@error('NC') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="expire-year">Expire Year :</label>
									<input id="expire-year" type="text" name="expire-year" value="" placeholder="Expire Year" wire:model="exp_year">
									@error('NC') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="cvv">CVV :</label>
									<input id="cvv" type="password" name="cvv" value="" placeholder="CVv" wire:model="cvv">
									@error('NC') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								</div>
								@endif
								<div class="choose-payment-methods">
									<label bel class="payment-method">
										<input name="payment-method" id="payment-method-cash" value="bank" type="radio" wire:model="payementmethode">
										<span>Cash On Delivery</span>
										<span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
									</label>
									<label class="payment-method">
										<input name="payment-method" id="payment-method-bank" value="card" type="radio" wire:model="payementmethode">
										<span>Credit Card</span>
										<span class="payment-desc">You can pay On Delivery</span>
										
									</label>
									@error('payementmethode') <p class="text-danger">{{$message}}</p> @enderror
									
								</div>
								@if(Session::has('checkout'))
								<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{session::get('checkout')['subtotal']}} DH</span></p>
								@endif
								<button wire:submit.prevent="placeorder" type="submit" class="btn btn-medium">Place order now</button>
							</div>
							<div class="summary-item shipping-method">
								<h4 class="title-box f-title">Shipping method</h4>
								<p class="summary-info"><span class="title">Flat Rate</span></p>
								<p class="summary-info"><span class="title">Fixed 0.00 DH </span></p>
							</div>
						</div>
				</form>
			</div><!--end main content area-->
		</div><!--end container-->

	</main>
