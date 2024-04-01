<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['Smart Phone', 'Laptop', 'Table', 'Keyboard', 'watch', 'Headphone', 'Mouse', 'Camera', 'Other'];
        foreach ($categories as $value) {
            Category::factory()->create([
                'name' => $value,
            ]);
        }
    }
}
