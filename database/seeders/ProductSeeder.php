<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::factory()->create([
            'name' => 'Samsung Galaxy S23',
            'description' => 'Hiệu năng vượt trội với con chip hàng đầu Qualcomm - 
            Phục vụ tốt nhu cầu đa nhiệm ngày của người dùng.',
            'price' =>
            13750000, 'feature' => 0,
            'qty' => 10, 'sale_amount' => 150000,
            'category_id' => 1,
            'manufacture_id' => 1,
        ]);
        Product::factory()->create([
            'name' => 'Samsung Galaxy S23 Ultra',
            'description' => 'Thoả sức chụp ảnh, quay video chuyên nghiệp - Camera đến 200MP, 
            chế độ chụp đêm cải tiến, bộ xử lí ảnh thông minh',
            'price' => 22990000, 'feature' => 1,
            'qty' => 10, 'sale_amount' => 150000,
            'category_id' => 1,
            'manufacture_id' => 1,
        ]);
        Product::factory()->create([
            'name' => 'iPhone 15 128GB Chính hãng',
            'description' => 'iPhone 15 128GB được trang bị màn hình Dynamic Island kích thước 6.1 
            inch với công nghệ hiển thị Super Retina XDR màn lại trải nghiệm hình ảnh vượt trội.',
            'price' => 19790000, 'feature' => 0,
            'qty' => 10, 'sale_amount' => 100000,
            'category_id' => 1,
            'manufacture_id' => 7,
        ]);
    }
}
