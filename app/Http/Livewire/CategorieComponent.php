<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Categorie;
use Gloudemans\Shoppingcart\Facades\Cart;
use vendor\nette\utils\src\Utils\Paginator;


class CategorieComponent extends Component
{ 
    
    
    public $categorie_slug;
   
    protected $paginationTheme = 'bootstrap';
    public $min_price;
    public $max_price;
    

    public function mount($categorie_slug){
        $this->min_price = 1;
        $this->max_price = 1000;
        $this->categorie_slug = $categorie_slug;
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
          
            
            $categorie = Categorie::where('slug',$this->categorie_slug)->first();
            $categorie_id = $categorie->id;
            $categorie_name = $categorie->name;
            $products = Product::where('category_id',$categorie_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate(8);
            $popular_products = Product::inRandomOrder()->limit(6)->get();  
            $latestproducts = Product::orderBy('created_at','DESC')->get()->take(8);
            $categories = Categorie::all();
        
       
        return view('livewire.categorie-component',['latestproducts'=>$latestproducts ,'products'=>$products,'categorie'=>$categorie, 'categories'=>$categories,'popular_products'=>$popular_products,'categorie_name'=>$categorie_name])->layout('layouts.base');
    }
    
}
