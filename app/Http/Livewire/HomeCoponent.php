<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Categorie;
use App\Models\HomeCategorie;
use Carbon\Carbon;

class HomeCoponent extends Component
{
    public function render()
    {

        $latestproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        $categorie = HomeCategorie::find(1);
        $cats = explode(',',$categorie );
        $categories = Categorie::whereIn('id',$cats)->get();
        $no_of_products = $categorie;
        $sproducts = Product::where('sale_price', '>', 0)->InRandomOrder()->get()->take(8);
        $sale = Sale::find(1);
        return view('livewire.home-coponent',['latestproducts'=>$latestproducts,'categories'=>$categories,'no_of_products'=>$no_of_products,'sproducts'=>$sproducts,'sale'=>$sale])->layout('layouts.base');
    }
}
