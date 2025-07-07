<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
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

    public function test_should_return_unauthorized_error_for_user_who_does_not_have_permission(): void
    {
        Route::get('test-something', function () {
            return 'test';
        })->middleware('permission:edit-articles');

        /** @var User $user */
        $user = User::factory()->createOne();

        $this->actingAs($user)
            ->get('test-something')
            ->assertForbidden();
    }

    public function test_should_be_able_to_authorize_access_to_a_route_based_on_the_permission(): void
    {
        Route::get('test-something', function () {
            return 'test';
        })->middleware('permission:edit-articles');

        /** @var User $user */
        $user = User::factory()->createOne();

        $user->givePermissionTo('edit-articles');

        $this->actingAs($user)
            ->get('test-something')
            ->assertSuccessful();
    }
}
