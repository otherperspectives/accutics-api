<?php

namespace Tests\Feature;

use App\Models\Campaign;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CampaignControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        // Send the request without a parameter
        $response = $this->json('GET','/api/campaigns');

        // We should receive 422 because we fail the validation
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        // Send the request with the correct parameter
        $order = $this->faker->randomElement(['asc', 'desc']);

        $response = $this->call('GET', '/api/campaigns', [ 'order' => $order]);
        $response->assertStatus(Response::HTTP_OK);

        // Check if new data is displayed in the response
        $campaigns = Campaign::factory()->count(20)->create()->toJson();
        $response = $this->call('GET','/api/campaigns', [ 'order' => 'desc' ]);

        $response->assertSee((array)$campaigns[0]);
        $response->assertSee((array)$campaigns[15]);

    }
}
