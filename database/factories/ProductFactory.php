<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker; 
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

        $dir = 'public/storage/uploads/';
        $width = 260;
        $height = 260;
        return [
            'name' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'image' => 'sdsdfjk',
            'price' => $this->faker->numberBetween($min = 50, $max = 500),
            'off_price' => $this->faker->numberBetween($min = 50, $max = 500),
            'expiry' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
