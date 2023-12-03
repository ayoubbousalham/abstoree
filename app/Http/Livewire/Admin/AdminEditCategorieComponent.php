<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Categorie;


class AdminEditCategorieComponent extends Component
{

    public $categorie_id;
    public $categorie_slug;
    public $name;
    public $slug;

    public function mount($categorie_slug){

        $this->categorie_slug = $categorie_slug;
        $categorie = Categorie::where('slug',$categorie_slug)->first();
        $this->categorie_id = $categorie->id;
        $this->categorie_name = $categorie->name;
        $this->slug = $categorie->slug;
    }

    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){

        $this->validateOnly($fields,[


            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
    }

    public function updateCategorie(){

        $this->validate([


            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);

        $categorie = Categorie::find($this->categorie_id);
        $categorie->name = $this->name;
        $categorie->slug = $this->slug;
        $categorie->save();
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-categorie-component')->layout('layouts.base');
    }
}
