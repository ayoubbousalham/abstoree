<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartCoponent extends Component
{

    public function setAmountForCheckout(){




        if(!Cart::instance('cart')->count() > 0){

            session()->forget('checkout');
            return;

        }
            session()->put('checkout',[

                'discount' => 0,
                'tax' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'total' => Cart::instance('cart')->total(),



            ]);
    }
    public function acqtt($rowId){

        $product = Cart::instance('cart')->get($rowId);
        $qtt = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qtt); 
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decqtt($rowId){

        $product = Cart::instance('cart')->get($rowId);
        $qtt = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qtt); 
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function deleteitem($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Product removed');
    }
    public function deleteall(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function render()
    {

        $latestproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        $this->setAmountForCheckout();
        return view('livewire.cart-coponent',['latestproducts'=>$latestproducts])->layout('layouts.base');
    }
    public function checkout(){
        if(Auth::check()){
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
    }
}
