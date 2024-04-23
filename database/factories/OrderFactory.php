<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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

            'user_id' => 'user_id',
            'order_date' =>  now(),
            'total' => 'total',
            'note' => $this->faker->sentence,
            'shipping' => 50000,
            'status' => 0,

        ];
    }
}
