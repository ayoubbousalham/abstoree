<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categorie;
use App\Models\HomeCategorie;


class AdminHomeCategorieComponent extends Component
{
    public $selected_categories = [];
    public $numberofproducts;
    public function mount()
    {
        $categorie = HomeCategorie::find(1);
        $this->selected_categories = explode(',',$categorie->sel_categories);
        $this->numberofproducts = $categorie->no_of_products;
    }
    public function updateHomeCategorie()
    {

        $categorie = HomeCategorie::find(1);
        $categorie->sel_categories = implode(',', $this->selected_categories);
        $categorie->no_of_products = $this->numberofproducts;
        $categorie->save();

    }

    public function render()
    {

        $categories = Categorie::all();
        return view('livewire.admin.admin-home-categorie-component',['categories'=>$categories])->layout('layouts.base');
    }
}
