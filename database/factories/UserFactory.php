<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = Storage::putFile('users', new File( public_path('/assets/avatar.png') ));
        return [
            'image' => $image,
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber(),
            'password' => '123456789',
            'remember_token' => Str::random(10),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $categorySeeder = new CategorySeeder($user);
            $categorySeeder->run();
        });
    }
}
