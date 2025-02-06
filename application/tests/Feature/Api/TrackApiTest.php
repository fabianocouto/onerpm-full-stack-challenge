<?php

namespace Tests\Feature\Api;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrackApiTest extends TestCase
{
    public function test_the_track_api_returns_a_successful_response(): void
    {
        $response = $this->get('/api/track');
        $response->assertStatus(200);
        $response->assertJsonIsObject();
    }
}
