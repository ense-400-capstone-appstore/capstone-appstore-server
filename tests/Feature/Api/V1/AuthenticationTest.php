<?php

namespace Tests\Feature\Api\V1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AuthenticationTest extends TestCase
{
    /**
     * Assert that a user can successfully login via the API
     * @param array $payload User credentials
     */
    public function assertAuthentication($payload)
    {
        $this->json('POST', '/api/v1/login', $payload)
            ->assertOk()
            ->assertJsonStructure(['data' => [
                'user_id',
                'access_token'
            ]]);
    }

    /**
     * Assert that different types of users can authenticate successfully
     */
    public function testAuthentication()
    {
        $this->assertAuthentication([
            'email' => 'user@matryoshkadoll.me',
            'password' => 'password'
        ]);

        $this->assertAuthentication([
            'email' => 'vendor@matryoshkadoll.me',
            'password' => 'password'
        ]);

        $this->assertAuthentication([
            'email' => 'admin@matryoshkadoll.me',
            'password' => 'password'
        ]);
    }
}
