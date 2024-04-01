<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ManufactureImage;

class ManufactureImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $manufactures = [
            ['Samsung', 'samsung.png'], ['Xiaomi', 'xiaomi.png'], ['Google', 'google.png'], ['Meizu', 'meizu.png'],
            ['Vsmart', 'vsmart.png'], ['Lenovo', 'lenovo.png'], ['Iphone', 'iphone.png']
        ];
        foreach ($manufactures as $key => $value) {
            ManufactureImage::factory()->create([
                'name' => $value[0],
                'url' =>   $value[1],
                'manufacture_id' => $key + 1
            ]);
        }
    }
}
