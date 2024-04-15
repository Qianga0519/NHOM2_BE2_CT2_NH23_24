<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' =>  'product_id',
            'user_id' =>  'product_id',
            'qty' =>  'qty',
            'price' =>  'price',
            'color_id' => 'color_id'
            //
        ];
    }
}
