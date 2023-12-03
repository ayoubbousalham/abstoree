<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategorieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categorie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $categoriry_name = $this->faker->unique()->words($nb=2,$asTaxt=true);   
        $slug = Str::slug($categoriry_name ) ;
        return [
            'name'=> $categoriry_name ,
            'slug'=> $slug,
        ];
    }
}
