<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    private $roles;
    
    public function __construct() {
        $this->roles = [
            ["name" => "user"],
            ["name" => "admin"]
        ];
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert($this->roles);
    }
}
