<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Family;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $family;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->family = Family::factory()->create();

        // Simulate authenticated user
        auth()->login($this->user);
        Session::put('family', $this->family);
    }

    /** @test */
    public function it_stores_a_valid_category()
    {
        $response = $this->post('/categories', [
            'name' => 'Groceries',
            'type' => 'expense',
            'family_id' => $this->family->id,
            'user_id' => $this->user->id,
            'color' => '#FF0000'
        ]);

        $response->assertRedirect('/')
            ->assertSessionHas('success', 'Category created successfully.');

        $this->assertDatabaseHas('categories', [
            'name' => 'Groceries',
            'type' => 'expense',
            'color' => '#FF0000'
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $response = $this->post('/categories', []);

        $response->assertSessionHasErrors([
            'name',
            'type',
            'family_id',
            'user_id'
        ]);
    }

    /** @test */
    public function it_requires_valid_type()
    {
        $response = $this->post('/categories', [
            'name' => 'Invalid',
            'type' => 'invalid-type',
            'family_id' => $this->family->id,
            'user_id' => $this->user->id
        ]);

        $response->assertSessionHasErrors('type');
    }

    /** @test */
    public function it_shows_category_creation_form()
    {
        $response = $this->get('/categories/create');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_shows_category_index()
    {
        $response = $this->get('/categories');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_shows_specific_category()
    {
        $category = Category::factory()->create([
            'family_id' => $this->family->id,
            'user_id' => $this->user->id
        ]);

        $response = $this->get("/categories/{$category->id}");
        $response->assertStatus(200);
    }

    /** @test */
    public function it_shows_edit_form()
    {
        $category = Category::factory()->create([
            'family_id' => $this->family->id,
            'user_id' => $this->user->id
        ]);

        $response = $this->get("/categories/{$category->id}/edit");
        $response->assertStatus(200);
    }

    /** @test */
    public function it_deletes_category()
    {
        $category = Category::factory()->create([
            'family_id' => $this->family->id,
            'user_id' => $this->user->id
        ]);

        $response = $this->delete("/categories/{$category->id}");
        $response->assertStatus(200); // Update this based on your implementation
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
