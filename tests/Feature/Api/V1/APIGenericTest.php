<?php

namespace Tests\Feature\Api\V1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class APIGenericTest extends TestCase
{
    /**
     * Test that unknown routes return a 404 JSON response.
     *
     * @return void
     */
    public function testUnknownRouteReturnsNotFound()
    {
        $this->json('GET', '/api/v1/')
            ->assertNotFound()
            ->assertJson([
                'message' => 'Not Found'
            ]);
    }
}
