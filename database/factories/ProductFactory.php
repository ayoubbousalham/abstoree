<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
    
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=4,$asTaxt=true);    
        $slug = str::slug( $product_name);
        return [
            'name'=> $product_name ,
            'slug'=> $slug,
            'short_description'=> $this->faker->text(50),
            'description'=>  $this->faker->text(80),
            'regular_price'=>  $this->faker->numberBetween(1,10),
            'SKU' => 'DIGI' . $this->faker->numberBetween(1,10),
            'quantity'=> $this->faker->numberBetween(1,22),
            'image'=> 'digital_' . $this->faker->unique()->numberBetween(1,22).'.jpg',
            'category_id'=> $this->faker->numberBetween(1,5)
        ];
    }
}
