<?php

namespace Tests\Feature\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AndroidAppTest extends TestCase
{
    public function testAndroidAppsAreCreatedCorrectly()
    {
        $payload = [
            'title' => 'Lorem',
            'available' => 1
        ];

        $this->json('POST', '/api/android_app', $payload)
            ->assertStatus(200)
            ->assertJson(['id' => 1, 'title' => 'Lorem', 'available' => 1]);
    }
}
