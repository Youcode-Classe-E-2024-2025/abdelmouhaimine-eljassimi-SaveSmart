<?php

namespace Tests\Feature;

use App\Models\SavingGoal;
use App\Models\User;
use App\Models\Family;
use App\Models\Category;
use App\Models\TotalBalance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class SavingGoalControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $family;
    private $category;

    protected function setUp(): void
    {
        parent::setUp();

        parent::setUp();

        $this->user = User::factory()->create();
        $this->family = Family::factory()->create();
        $this->category = Category::factory()->create(['type' => 'goal']);

        TotalBalance::factory()->create(['family_id' => $this->family->id]);

        Auth::login($this->user);
        Session::put('family', $this->family);
        Session::put('user', $this->user); // Add this line
    }

    /** @test */
    public function it_displays_goals_index()
    {
        $response = $this->get('/goal');
        $response->assertStatus(200)
            ->assertViewHas('goals')
            ->assertViewHas('budget');
    }

    /** @test */
    public function it_creates_family_saving_goal()
    {
        $data = [
            'name' => 'Family Vacation',
            'target_amount' => 5000,
            'category_id' => $this->category->id,
            'target_date' => now()->addYear()->format('Y-m-d'),
            'family_id' => $this->family->id,
            'user_id' => $this->user->id,
        ];

        $response = $this->post('/SavingGoal', $data);
        $response->assertRedirect('/')
            ->assertSessionHas('success');

        $this->assertDatabaseHas('saving_goals', [
            'name' => 'Family Vacation',
            'target_amount' => 5000
        ]);
    }

    /** @test */
    public function it_creates_personal_saving_goal()
    {
        $data = [
            'name' => 'Personal Savings',
            'target_amount' => 1000,
            'category_id' => $this->category->id,
            'target_date' => now()->addMonths(6)->format('Y-m-d'),
            'family_id' => $this->family->id,
        ];

        $response = $this->post('/SavingPersonalGoal', $data);
        $response->assertRedirect('/goal')
            ->assertSessionHas('success');

        $this->assertDatabaseHas('saving_goals', [
            'name' => 'Personal Savings',
            'user_id' => $this->user->id // Verify user_id is set
        ]);
    }

    /** @test */
    public function it_updates_saving_goal()
    {
        $goal = SavingGoal::factory()->create([
            'family_id' => $this->family->id,
            'user_id' => $this->user->id
        ]);

        $data = [
            'goal_id' => $goal->id,
            'name' => 'Updated Goal Name',
            'target_amount' => 1500,
            'target_date' => now()->addYear()->format('Y-m-d'),
            'current_amount' => 500,
        ];

        $response = $this->post('/EditSavingGoal', $data);
        $response->assertRedirect('/goal')
            ->assertSessionHas('success');

        $this->assertDatabaseHas('saving_goals', [
            'id' => $goal->id,
            'name' => 'Updated Goal Name',
            'current_amount' => 500
        ]);
    }

    /** @test */
    public function it_adds_money_to_goal()
    {
        $goal = SavingGoal::factory()->create([
            'family_id' => $this->family->id,
            'current_amount' => 100
        ]);

        $data = [
            'category_id' => $this->category->id,
            'amount' => 50
        ];

        $response = $this->post('/addMoney', $data);
        $response->assertRedirect('/');

        $this->assertDatabaseHas('saving_goals', [
            'id' => $goal->id,
            'current_amount' => 150
        ]);
    }

    /** @test */
    public function it_deletes_saving_goal()
    {
        $goal = SavingGoal::factory()->create(['family_id' => $this->family->id]);

        $response = $this->get("/deleteGoal/{$goal->id}");
        $response->assertRedirect('/goal')
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('saving_goals', ['id' => $goal->id]);
    }

    /** @test */
    public function it_exports_csv()
    {
        SavingGoal::factory()->create(['family_id' => $this->family->id]);

        $response = $this->get('/exportcsv');
        $response->assertHeader('Content-Type', 'text/csv')
            ->assertStatus(200);
    }

    /** @test */
    public function it_validates_saving_goal_creation()
    {
        $response = $this->post('/SavingGoal', []);
        $response->assertSessionHasErrors([
            'name',
            'target_amount',
            'target_date',
            'family_id',
            'user_id'
        ]);
    }

    /** @test */
    public function it_handles_nonexistent_goal_deletion()
    {
        $response = $this->get('/deleteGoal/999');
        $response->assertRedirect('/goal')
            ->assertSessionHas('error');
    }
}
