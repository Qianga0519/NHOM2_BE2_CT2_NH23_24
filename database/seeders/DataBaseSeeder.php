<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Manufacture;
use App\Models\ManufactureImage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Avatar;
use App\Models\Cart;
use Illuminate\Support\Str;

class DataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = ['admin', 'user'];
        foreach ($roles as $value) {
            Role::factory()->create([
                'role_name' => $value,
            ]);
        };
        $manufactures = [
            'Samsung', 'Xiaomi', 'Google', 'Meizu',  'Vsmart', 'Lenovo', 'Iphone'
        ];
        foreach ($manufactures as $value) {
            Manufacture::factory()->create([
                'name' => $value,
                'country' =>  Str::random(10)
            ]);
        }
        // ['Meizu', 'meizu.png']
        // ['Lenovo', 'lenovo.png']
        $manufactures = [
            ['Samsung', 'samsung.png'], ['Xiaomi', 'xiaomi.png'], ['Google', 'google.png'], ['OPPO', 'oppo.png'],
            ['Vsmart', 'vsmart.png'], ['realme', 'realme.png'], ['Iphone', 'iphone.png'], ['Vivo', 'vivo.png'],
            ['HONOR', 'honor.png'], ['Sony', "sony.png"],
        ];
        foreach ($manufactures as $key => $value) {
            ManufactureImage::factory()->create([
                'name' => $value[0],
                'url' =>   $value[1],
                'manufacture_id' => $key + 1
            ]);
        }
        $categories = [
            ['Smart Phone', 'smartphone'],
            ['Laptop', 'laptop'],
            ['Tablet',  'tablet'],
            ['Keyboard', 'keyboard'],
            ['Watch',  'watch'],
            ['Headphone',  'headphone'],
            ['Mouse',  'mouse'],
            ['Camera', 'camera'],
            ['Other', 'other']
        ];
        foreach ($categories as $value) {
            Category::factory()->create([
                'name' => $value[0],
                'slug' => $value[1],
            ]);
        }

        User::factory()->create([
            'name' => 'admin',
            'email' => 'thanhquangtran11@gmail.com',
            'password' => bcrypt('admin123'),
            'role_id' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'fullname' => 'Tran Thanh Quang',
            'phone' => '0900101012'

        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('user123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'fullname' => 'Tran Thanh User',
            'phone' => '0900101011',
            'city' => 'HCM',
        ]);
        Avatar::factory()->create([
            'user_id' => 1,
            'url' => 'admin.png'
        ]);
        Avatar::factory()->create([
            'user_id' => 2,
            'url' => 'user.png'
        ]);


        Order::factory()->create([
            'user_id' => 2,
            'order_date' =>  now(),
            'total' => 200000,
            'note' => 'don hang user',
            'qty' => 3,
            'shipping' => 20000,
            'status' => 0,

        ]);
        OrderItem::factory()->create([
            'qty' => 2,
            'price' => 100000,
            'discount' => 0,
            'order_id' => 1,
            'product_id' => 1,
            'color_id' => 1
        ]);

        OrderItem::factory()->create([
            'qty' => 3,
            'price' => 120000,
            'discount' => 0,
            'order_id' => 1,
            'product_id' => 2,
            'color_id' => 3
        ]);
        Cart::factory()->create([
            'qty' => 3,
            'price' => 120000,
            'product_id' => 1,
            'user_id' => 2,
            'color_id' => 1
        ]);
        Cart::factory()->create([
            'qty' => 1,
            'price' => 40000,
            'product_id' => 2,
            'user_id' => 2,
            'color_id' => 2
        ]);
    }
}
