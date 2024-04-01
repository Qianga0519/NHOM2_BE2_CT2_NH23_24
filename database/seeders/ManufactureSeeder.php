<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manufacture;
use Illuminate\Support\Str;

class ManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // , 'LG', 'OPPO',
        //     ' Nubia Red Magic', 'POCO', 'Realme', 'Redmi', 'Vivo', 'SONY', 'Canon', 'Asus', 'OnePlus',  'MacBook',
        //     'HP', 'Lenovo', 'Acer', 'MSI', 'Dell', 'Gigabyte', 'Huawei', 'Masstel', 'Vaio', 'Surface',
        //
        $manufactures = [
            'Samsung', 'Xiaomi', 'Google', 'Meizu',  'Vsmart', 'Lenovo', 'Iphone'
        ];
        foreach ($manufactures as $value) {
            Manufacture::factory()->create([
                'name' => $value,
                'country' =>  Str::random(10)
            ]);
        }
    }
}
