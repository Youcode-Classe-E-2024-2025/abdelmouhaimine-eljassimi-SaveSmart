<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_registration_page_is_accessible()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/login');
        $this->assertDatabaseHas('users', ['email' => 'testuser@example.com']);
    }

    public function test_login_page_is_accessible()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'testuser@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/family');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'testuser@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect('/login?error=Email or password is incorrect');
        $this->assertGuest();
    }

    /** @test */
    public function it_can_logout()
    {

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),
        ]);

        $this->actingAs($user);

        auth()->logout();

        $this->assertGuest();

        $response = $this->get('/logout');
        $response->assertRedirect('/login');
    }

}
