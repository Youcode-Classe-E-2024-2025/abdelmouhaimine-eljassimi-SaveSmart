<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_register_a_new_user()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'john.doe@example.com',
        ]);
        $response->assertRedirect('/login');
    }

    /** @test */
    public function it_can_login_with_valid_credentials()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),
        ]);


        $response = $this->post('/login', [
            'email' => 'john.doe@example.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/family');
    }

    /** @test */
    public function it_cannot_login_with_invalid_credentials()
    {

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'john.doe@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect('/login?error=Email or password is incorrect');
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
