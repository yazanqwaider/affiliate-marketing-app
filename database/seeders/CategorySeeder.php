<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public $user;
    private $categories;

    public function __construct($user) {
        $this->user = $user;

        $this->categories = [
            ["name" => "salary", "type" => "income"],
            ["name" => "bonuses", "type" => "income"],
            ["name" => "overtime", "type" => "income"],
            ["name" => "food", "type" => "expenses"],
            ["name" => "drinks", "type" => "expenses"],
            ["name" => "shopping", "type" => "expenses"],
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user->categories()->createMany($this->categories);
    }
}
