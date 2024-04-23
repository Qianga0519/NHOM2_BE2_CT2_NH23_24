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
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDate = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        //
        $roles = ['admin', 'user'];
        foreach ($roles as $value) {
            Role::factory()->create([
                'role_name' => $value,
            ]);
        };
        // $manufactures = [
        //     'Samsung', 'Xiaomi', 'Google', 'Oppo', 'Vsmart', 'Vsmart', 'Realme', 'Lenovo', 'Apple', 'Sony'
        // ];


        $manufactures = [
            ['Samsung', 'samsung', 'samsung.jpg'], ['Xiaomi', 'xiaomi', 'xiaomi.jpg'], ['Google', 'google', 'google.jpg'], ['OPPO', 'oppo', 'oppo.png'],
            ['Vsmart', 'vsmart', 'vsmart.png'], ['realme', 'realme', 'realme.png'], ['Meizu', 'meizu', 'meizu.jpg'], ['Apple', 'apple', 'apple.jpg'], ['Vivo', 'vivo', 'vivo.jpg'],
            ['HONOR', 'honor', 'honor.png'], ['Sony', 'sony', "sony.jpg"], ['Lenovo', 'lenovo', 'lenovo.png']
        ];
        foreach ($manufactures as $key => $value) {
            ManufactureImage::factory()->create([
                'name' => $value[0],
                'url' =>   $value[2],
                'manufacture_id' => $key + 1
            ]);
            Manufacture::factory()->create([
                'name' => $value[0],
                'slug' => $value[1],
                'country' =>  Str::random(10)
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
            'name' => 'Qiang0869',
            'email' => 'thanhquangtran11@gmail.com',
            'password' => bcrypt('adminq'),
            'role_id' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'fullname' => 'Tran Thanh Quang',
            'phone' => '0900101012'

        ]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role_id' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'fullname' => 'Admin A',
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'fullname' => 'Tran Thanh User',
            'phone' => '0900101011',
            'city' => 'HCM',
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('user123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'fullname' => 'Tran Thanh User1',
            'phone' => '0900101911',
            'city' => 'HCM',
        ]);
        Avatar::factory()->create([
            'user_id' => 1,
            'url' => 'admin.png'
        ]);
        Avatar::factory()->create([
            'user_id' => 2,
            'url' => 'admin.png'
        ]);

        Avatar::factory()->create([
            'user_id' => 3,
            'url' => 'user.png'
        ]);
        Avatar::factory()->create([
            'user_id' => 4,
            'url' => 'user.png'
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
        Post::factory()->create([
            'user_id' => 2,
        ]);
        Post::factory()->create([
            'user_id' => 1,
        ]);
        Post::factory()->create([
            'user_id' => 1,
        ]);
        Post::factory()->create([
            'user_id' => 2,
        ]);
        $img = [
            'realme-c67.jpg', 'oppo-reno-11.jpg', 'samsung-galaxy-s24.jpg', 'samsung-galaxy-s24-plus.jpg'
        ];
        foreach ($img as $key => $item) {
            PostImage::factory()->create([
                'url' => $item,
                'post_id' => $key + 1,
            ]);
        }

        Order::factory()->create([
            'user_id' => 3,
            'total' => 2900000
        ]);
        OrderItem::factory()->create([
            'qty' => 2,
            'product_id' => 1,
            'order_id' => 1,
            'color_id' => 1,
            'price' => 200000
        ]);
        OrderItem::factory()->create([
            'qty' => 1,
            'product_id' => 2,
            'order_id' => 1,
            'color_id' => 3,
            'price' => 2500000

        ]);
        Order::factory()->create([
            'user_id' => 4,
            'total' => 22400000
        ]);
        OrderItem::factory()->create([
            'qty' => 2,
            'product_id' => 5,
            'order_id' => 2,
            'color_id' => 1,
            'price' => 2500000
        ]);
        OrderItem::factory()->create([
            'qty' => 1,
            'product_id' => 7,
            'order_id' => 2,
            'color_id' => 2,
            'price' => 17400000
        ]);
    }
}
