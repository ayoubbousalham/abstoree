<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Categorie;

class AdminAddCategorieComponent extends Component
{
    public $name;
    public $slug;
    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){

        $this->validateOnly($fields,[


            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
    }
    
    
    public function storeCategorie(){




        $this->validate([


            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $categorie = new Categorie();
        $categorie->name = $this->name;
        $categorie->slug = $this->slug;
        $categorie->save();
    }
    public function render()
    {
        return view('livewire.admin.admin-add-categorie-component')->layout('layouts.base');
    }
}
