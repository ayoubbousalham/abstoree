<?php

namespace App\Http\Livewire\Admin;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Categorie;

class AdminCategorieComponent extends Component
{

    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    public function deletecategorie($id){
        $categorie = Categorie::find($id);
        $categorie->delete();
        

    }

    public function render()

    {
        
        $categories=Categorie::paginate(6);
        return view('livewire.admin.admin-categorie-component',['categories'=>$categories])->layout('layouts.base');
    }
    
}
