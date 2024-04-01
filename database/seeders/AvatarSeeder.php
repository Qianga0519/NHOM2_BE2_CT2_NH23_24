<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Avatar::factory()->create([
            'user_id' => 1,
            'url' => 'admin.png'
        ]);
        Avatar::factory()->create([
            'user_id' => 2,
            'url' => 'user.png'
        ]);
    }
}
