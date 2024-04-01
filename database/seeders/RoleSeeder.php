<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
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
    }
}
