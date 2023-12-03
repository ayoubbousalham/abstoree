<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Categorie;

class AdminProductComponent extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;


    public function deleteproduct($id){
        $product = Product::find($id);
        $product->delete();
        

    }

    public function render()

    {
        
        $products = Product::paginate(6);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
    
}
