<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Family;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;


class FamilyControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_view_families()
    {
        $user = User::factory()->create();
        $family = Family::factory()->create();
        $user->families()->attach($family->id);

        $this->actingAs($user);
        session(['user' => $user]);

        $response = $this->get('/family');

        $response->assertStatus(200);
        $response->assertViewIs('family');
        $response->assertViewHas('families');
    }

    /** @test */
    public function user_can_create_family()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        session(['user' => $user]);

        $response = $this->post('/createprofile', [
            'name' => 'New Family',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/family');
        $this->assertDatabaseHas('families', ['name' => 'New Family']);
        $this->assertTrue($user->families()->exists());
    }

    /** @test */
    public function family_can_be_validated()
    {
        $this->withoutMiddleware();

        $family = Family::factory()->create([
            'password' => Hash::make('password123')
        ]);

        $response = $this->post('/validateprofile', [
            'id' => $family->id,
            'password' => 'password123',
        ]);

        $response->assertRedirect('/'); // Redirect to dashboard
        $this->assertEquals($family->id, session('family')->id);
    }





    /** @test */
    public function family_can_logout()
    {
        $family = Family::factory()->create();
        session(['family' => $family]);

        $response = $this->get('/logoutprofile');

        $response->assertRedirect('/family');
        $this->assertNull(session('family'));
    }
}
