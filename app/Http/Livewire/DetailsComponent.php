<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Cart;

class DetailsComponent extends Component

{

    public $slug;
    public $qty;
    public function mount($slug){
        $this->slug = $slug;
        $this->qty = 1;
    }
    public function incqty(){

        $this->qty++;
    }

    public function decqty(){
        if($this->qty > 1){

            $this->qty--;
        }

        
    }
    public function  store($product_id,$product_name,$product_price){


        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Product added in Cart');
        return redirect()->route('shop');
    }
    public function render()
    {
       
        $product = Product::where('slug',$this->slug)->first();
        $products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $popular_products = Product::inRandomOrder()->limit(4)->get();  
        $sale = Sale::find(1);  
        return view('livewire.details-component',['products'=>$products,'product'=>$product,'popular_product'=>$popular_products,'sale'=>$sale ])->layout('layouts.base');
    }
}
