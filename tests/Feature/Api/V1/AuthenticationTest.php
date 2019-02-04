<?php

namespace Tests\Unit\Api\V1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AuthenticationTest extends TestCase
{
    /**
     * Assert that the test user can successfully login via the API
     */
    public function testUsersCanAuthenticate()
    {
        $payload = [
            'email' => 'user@matryoshkadoll.me',
            'password' => 'password'
        ];

        $this->json('POST', '/api/v1/login', $payload)->assertStatus(200);
    }
}
