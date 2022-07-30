<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::whereName('admin')->first();
        User::factory()->for($role)->state([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0780000000',
        ])->create();
    }
}
