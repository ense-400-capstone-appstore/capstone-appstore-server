<?php

namespace Tests\Unit\Api\V1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AuthenticationTest extends TestCase
{
    private $user = null;

    public function testUsersCanRegister()
    {
        $this->user = factory(User::class)->make();

        $payload = [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'password' => $this->user->password
        ];

        $this->json('POST', '/api/v1/register', $payload)
            ->assertStatus(201);
    }

    public function testUsersCanAuthenticate()
    {
        $this->testUsersCanRegister();

        $payload = [
            'email' => $this->user->email,
            'password' => $this->user->password
        ];

        $this->json('POST', '/api/v1/login', $payload)
            ->assertStatus(200);
    }

    public function testUsersOldTokensAreDeleted()
    {
        $this->testUsersCanRegister();

        $payload = [
            'email' => $this->user->email,
            'password' => $this->user->password
        ];

        $token1 = $this->json('POST', '/api/v1/login', $payload)
            ->assertStatus(200);

        $token2 = $this->json('POST', '/api/v1/login', $payload)
            ->assertStatus(200);

        assert($token1 != $token2);
    }
}
