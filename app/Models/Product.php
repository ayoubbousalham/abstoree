<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
class Product extends Model
{
    use HasFactory;
    protected $table = "products"
    ;
    public function categorie(){
        return $this->belongsTo(Categorie::class,'category_id');

    }
}
