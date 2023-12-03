<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Categorie;
use Gloudemans\Shoppingcart\Facades\Cart;
use vendor\nette\utils\src\Utils\Paginator;


class SearchComponent extends Component
{   protected $paginationTheme = 'bootstrap';
    public $min_price;
    public $max_price;

    public $search;
    public $product_cat;
    public $product_cat_id;
    public $categorie_slug_id;

    

    public function mount(){
        $this->min_price = 1;
        $this->max_price = 1000;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    public function addToWishlist($product_id,$product_name,$product_price){

        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        
    }
    public function deleteFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;

            }

        } 
    }


    

    public function  store($product_id,$product_name,$product_price){


        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Product added in Cart');
        return redirect()->route('shop');
    }





    use WithPagination;
    public function render()
    { 
            $products = Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id .'%')->paginate(8);
            $popular_products = Product::inRandomOrder()->limit(6)->get();  
            $latestproducts = Product::orderBy('created_at','DESC')->get()->take(8);
            $categories = Categorie::all();
        
       
        return view('livewire.search-component',['latestproducts'=>$latestproducts,'products'=>$products,'categories'=>$categories,'popular_products'=>$popular_products])->layout('layouts.base');
    }
    
}
