<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ProductImage::factory()->create([
            'name' => 'Samsung Galaxy S23',
            'url' => 'samsung-galaxy-s23-den.jpg',
            'product_id' => 1
        ]);
        ProductImage::factory()->create([
            'name' => 'Samsung Galaxy S23 Ultra',
            'url' => 'samsung-galaxy-s23-ultra.jpg',
            'product_id' => 2
        ]);
        ProductImage::factory()->create([
            'name' => 'iPhone 15 128GB Chính hãng',
            'url' => 'iphone-15-den.jpg',
            'product_id' => 3
        ]);
    }
}
