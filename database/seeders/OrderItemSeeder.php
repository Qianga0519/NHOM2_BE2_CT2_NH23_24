<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        OrderItem::factory()->create([
            'qty' => 2,
            'price' => 100000,
            'discount' => 0,
            'order_id' => 1,
            'product_id' => 1,
        ]);
        OrderItem::factory()->create([
            'qty' => 3,
            'price' => 120000,
            'discount' => 0,
            'order_id' => 1,
            'product_id' => 2,
        ]);
    }
}
