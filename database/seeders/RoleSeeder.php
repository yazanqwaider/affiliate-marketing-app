<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    private $roles;
    
    public function __construct() {
        $this->roles = [
            ["role" => "user"],
            ["role" => "admin"]
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
