<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_should_be_able_to_give_a_permission_to_an_user(): void
    {
        $user = User::factory()->create();

        $user->givePermissionTo('edit-articles');

        $this->assertTrue($user->hasPermissionTo('edit-articles'));

        $this->assertDatabaseHas('permissions', [
            'permission' => 'edit-articles'
        ]);
    }
}
