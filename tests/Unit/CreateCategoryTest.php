<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;

class CreateCategoryTest extends TestCase
{
    use WithFaker;
    
    private $types;

    public function setUp(): void {
        parent::setUp();

        $this->types = ['income', 'expenses'];
        $role = Role::whereName('user')->first();
        $user = User::factory()->for($role)->create();
        $this->actingAs($user);
    }

    public function test_create_user_with_wrong_name()
    {
        $data = [
            'name'  => null,
            'type'  => $this->faker->randomElement($this->types),
        ];

        $response = $this->post('/categories', $data);
        $response->assertInvalid(['name']);
    }

    public function test_create_user_with_valid_data()
    {
        $data = [
            'name'  => $this->faker->name(),
            'type'  => $this->faker->randomElement($this->types),
        ];

        $response = $this->post('/categories', $data);
        $this->assertDatabaseHas('categories', [
            'user_id' => Auth::id(),
            'name' => $data['name']
        ]);
    }
}
