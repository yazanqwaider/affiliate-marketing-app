<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;

class CreateUserTest extends TestCase
{
    use WithFaker;

    public function test_create_user_with_wrong_email()
    {
        Storage::fake('public');
        $data = [
            'name'  => $this->faker->name(),
            'email'  => '',
            'phone'  => $this->faker->phoneNumber(),
            'image'  => UploadedFile::fake()->create('image.png'),
            'password'=> '123456789'
        ];

        $response = $this->post('/register', $data);
        $response->assertInvalid(['email']);
    }

    public function test_create_user_without_image()
    {
        $data = [
            'name'  => $this->faker->name(),
            'email'  => $this->faker->email(),
            'phone'  => $this->faker->phoneNumber(),
            'image'  => null,
            'password'=> '123456789'
        ];

        $response = $this->post('/register', $data);
        $response->assertInvalid(['image']);
    }

    public function test_create_user_with_valid_fields()
    {
        $this->withoutExceptionHandling();
        Storage::fake('public');
        
        $data = [
            'name'  => $this->faker->name(),
            'email'  => $this->faker->email(),
            'phone'  => (int)$this->faker->numerify('##########'),
            'image'  => UploadedFile::fake()->create('image.png', 800),
            'password'=> '123456789',
            'password_confirmation'=> '123456789',
            'referer_user_id'   => null,
            'birthdate' => null
        ];

        $response = $this->post('/register', $data);
        $this->assertDatabaseHas('users', [
            'email' => $data['email']
        ]);
    }

}
