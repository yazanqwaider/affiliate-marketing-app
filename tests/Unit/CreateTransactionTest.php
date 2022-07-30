<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;

class CreateTransactionTest extends TestCase
{
    private $user;
    public function setUp(): void {
        parent::setUp();

        $role = Role::whereName('user')->first();
        $user = User::factory()->for($role)->create();
        $user->load('categories');
        $this->user = $user;
        $this->actingAs($user);
    }

    public function test_create_transaction_with_missing_fields() {
        $data = [
            'category_id' => null,
            'amount' => rand(1, 100),
            'note' => null,
        ];

        $response = $this->post('transactions', $data);
        $response->assertInvalid(['category_id']);
    }

    public function test_create_transaction_with_correct_data() {
        $category = $this->user->categories->where('type', 'income')->first();
        $data = [
            'category_id' => $category->id,
            'amount' => rand(1, 100),
            'note' => null,
        ];

        $response = $this->post('transactions', $data);
        $response->assertSessionHas('messageStatus', 'success');
    }

    public function test_create_expenses_transaction_when_balance_is_not_enough() {
        $category = $this->user->categories->where('type', 'expenses')->first();
        $data = [
            'category_id' => $category->id,
            'amount' => rand(1, 100),
            'note' => null,
        ];

        $response = $this->post('transactions', $data);
        $response->assertSessionHas('messageStatus', 'danger');
    }


    public function test_create_expenses_transaction_when_balance_is_enough() {
        $category = $this->user->categories->where('type', 'expenses')->first();
        $this->user->increment('balance', 100);

        $data = [
            'category_id' => $category->id,
            'amount' => rand(1, 100),
            'note' => null,
        ];

        $response = $this->post('transactions', $data);
        $response->assertSessionHas('messageStatus', 'success');
    }
}
