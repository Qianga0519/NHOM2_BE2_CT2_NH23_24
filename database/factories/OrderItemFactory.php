<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'qty' => 'qty',
            'price' => 'price',
            'discount' => 'discount',
            'order_id' => 'order_id',
            'product_id' => 'product_id',
        ];
    }
}
