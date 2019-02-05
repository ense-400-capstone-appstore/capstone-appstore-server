<?php

namespace Tests\Unit\Api\V1;

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
    public function assertUserCanAuthenticate($payload)
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
    public function testUsersCanAuthenticate()
    {
        $this->assertUserCanAuthenticate([
            'email' => 'user@matryoshkadoll.me',
            'password' => 'password'
        ]);

        $this->assertUserCanAuthenticate([
            'email' => 'vendor@matryoshkadoll.me',
            'password' => 'password'
        ]);

        $this->assertUserCanAuthenticate([
            'email' => 'admin@matryoshkadoll.me',
            'password' => 'password'
        ]);
    }
}
