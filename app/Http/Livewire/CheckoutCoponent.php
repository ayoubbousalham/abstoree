<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Transaction;
use Cart;
use Stripe;
use Illuminate\Support\Facades\Auth;

class CheckoutCoponent extends Component
{

    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $is_shipping_diferent;  

    public $payementmethode;
    public $thankyou;

    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvv;
    
    public function placeOrder(){
        $this->validate([

            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'payementmethode' => 'required',
        ]);
        $this->validate([

            'card_no'=>'required|numeric',
            'exp_month'=>'required|numeric',
            'exp_year'=>'required|numeric',
            'cvv'=>'required|numeric',
            
        ]);

            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->tax = session()->get('checkout')['tax'];
            $order->discount = session()->get('checkout')['discount'];
            $order->subtotal = session()->get('checkout')['subtotal'];
            $order->total = session()->get('checkout')['total'];   
            $order->firstname = $this->firstname;
            $order->lastname = $this->lastname;
            $order->email = $this->email;
            $order->mobile = $this->phone;
            $order->line1 = $this->line1;
            $order->line2 = $this->line2;
            $order->city = $this->city;
            $order->province = $this->province;
            $order->country = $this->country;
            $order->zipcode = $this->zipcode;
            $order->status = 'ordered';
            $order->is_shipping_diferent = $this->is_shipping_diferent ? 1:0;
            $order->save();

            foreach(Cart::instance('cart')->content() as $item){

                $orderItem = new OrderItem();
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->price = $item->price;
                $orderItem->quantity = $item->qty;
                $orderItem->save();

            }

            if($this->payementmethode == 'cod'){

               $this->makeTransaction($order_id,'pending');
               $this->resetCart();
            }else 
            if($this->payementmethode == 'card') {
               $stripe = Stripe::make(env('STRIPE_SECRET'));

               try{
                            $token = $stripe->tokens()->create([

                                'card' => [
                                    'number' => $this->card_no,
                                    'exp_month' => $this->exp_month,
                                    'exp_year' => $this->exp_year,
                                    'cvc' => $this->cvv,

                                ]
                            ]);

                            if(!isset($token['id']))
                            {
                                session()->flash('stripe_error','the stripe token was not generaate correctly!!');
                                $this->thankyou = 0;

                            }
                            

                            $customer = $stripe->customers()->create([

                                'name' => $this->firstname . ' ' .$this->lastname,
                                'email' => $this->email, 
                                'phone' => $this->phone, 
                                    'address' =>[ 'line1' =>  $this->line1, 
                                    'postal_code' =>  $this->zipcode, 
                                    'city' =>  $this->city, 
                                    'state' =>  $this->province, 
                                    'country' =>  $this->country, 
                                ],
                                'source' => $token['id']
                            ]);
                                $charge = $stripe->chargeS()->create([
                                    'card' => $customer['id'],
                                    'currency' => 'USD',
                                    'amount' => session()->get('checkout')['total'],
                                    'description' => 'payment for order no' . $order->id
                                ]);
                                if($charge['status'] == 'succeded'){
                                    $this->makeTransaction($order_id,'approved');
                                    $this->resetCart();
                                }else{
                                    session()->flash('stripe_error','the stripe token was not generaate correctly!!');
                                    $this->thankyou = 0;

                                }
                                    } catch(Exception $e){
                                        session()->flash('stripe_error',$e->getMessage());
                                        $this->thankyou = 0;

                                    }

            }
            
        
    }

    public function resetCart(){
        $this->thankyou = 1;
            Cart::instance('cart')->destroy();
            session()->forget('checkout');


    }
    public function makeTransaction($order_id,$status){
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order->id;
        $transaction->mode = $this->payementmethode;
        $transaction->status = $status  ;
        $transaction->save();





    }
    public function verifyForCheckout(){

        if(!Auth::check()){

            return redirect()->route('login');
        }else if($this->thankyou){
            return redirect()->route('thankyou');

        }else if(!session()->get('checkout')){
            return redirect()->route('product.cart');
        }
    }
    
    public function update($fields){
        $this->validateOnly($fields,[

            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'phone'=> 'required|numeric',
            'zipcode'=>'required',
            'line1'=>'required',
            'city'=>'required',
            'province'=>'required',
            'country'=>'required',
          
            'payementmethode'=>'required',  
        ]);
        if(payementmethode == 'card')
        $this->validateOnly($fields,[

            'card_no'=>'required|numeric',
            'exp_month'=>'required|numeric',
            'exp_year'=>'required|numeric',
            'cvv'=>'required|numeric',
            
        ]);
    }
    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-coponent')->layout('layouts.base');
    }
}
