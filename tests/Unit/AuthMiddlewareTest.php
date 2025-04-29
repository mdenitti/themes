<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthMiddlewareTest extends TestCase
{
    public function test_not_logged_in_redirect(): void
    {
        $response = $this->get('/cities');
        $response->assertStatus(302);
    }

    public function test_non_admin_blocked(): void
    {
        // Create user and log them in
        $user = User::factory()->create();
        $this->actingAs($user);
        
        $response = $this->get('/cities');
        $response->assertStatus(403);

        $user->delete();
    }

    public function test_admin_has_access(): void 
    {
        // Create user, set admin, and log in
        $user = User::factory()->create();
        $user->is_admin = true;
        $this->actingAs($user);

        $response = $this->get('/cities');
        $response->assertStatus(200);

        $user->delete();
    }
}
