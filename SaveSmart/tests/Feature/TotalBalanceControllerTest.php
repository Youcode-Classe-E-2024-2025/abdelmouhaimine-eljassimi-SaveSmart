<?php

namespace Tests\Feature;

use App\Models\Family;
use App\Models\TotalBalance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class TotalBalanceControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $family;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->family = Family::factory()->create();

        // Simulate authenticated user and family session
        auth()->login($this->user);
        Session::put('family', $this->family);
    }

    /** @test */
    public function it_adds_budget_successfully()
    {
        $response = $this->post('/AddBudget', [
            'Budget' => 5000.00
        ]);

        $response->assertRedirect('/goal');
        $this->assertDatabaseHas('total_balances', [
            'family_id' => $this->family->id,
            'balance' => 5000.00
        ]);
    }

    /** @test */
    public function add_budget_requires_valid_data()
    {
        // Test missing budget
        $response = $this->post('/AddBudget', []);
        $response->assertSessionHasErrors('Budget');

        // Test non-numeric budget
        $response = $this->post('/AddBudget', ['Budget' => 'invalid']);
        $response->assertSessionHasErrors('Budget');
    }

    /** @test */
    public function it_calculates_optimization_correctly()
    {
        $response = $this->post('/optimization', [
            'budget' => 10000
        ]);

        $response->assertRedirect('/goal');

        $expected = [
            'besoins' => 5000,
            'envies' => 3000,
            'epargne' => 2000,
        ];

        $this->assertEquals($expected, session('optimizationResult'));
    }

    /** @test */
    public function optimization_requires_valid_data()
    {
        // Test missing budget
        $response = $this->post('/optimization', []);
        $response->assertSessionHasErrors('budget');

        // Test non-numeric budget
        $response = $this->post('/optimization', ['budget' => 'invalid']);
        $response->assertSessionHasErrors('budget');
    }

    /** @test */
    public function it_handles_zero_budget_gracefully()
    {
        $response = $this->post('/optimization', ['budget' => 0]);

        $expected = [
            'besoins' => 0,
            'envies' => 0,
            'epargne' => 0,
        ];

        $this->assertEquals($expected, session('optimizationResult'));
    }

    /** @test */
    public function it_handles_negative_budget_correctly()
    {
        // This test assumes your application allows negative budgets
        // If not, you should add validation to prevent it
        $response = $this->post('/optimization', ['budget' => -1000]);

        $expected = [
            'besoins' => -500,
            'envies' => -300,
            'epargne' => -200,
        ];

        $this->assertEquals($expected, session('optimizationResult'));
    }
}
