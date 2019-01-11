<?php

namespace Tests\Unit\Api\V1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AuthenticationTest extends TestCase
{
    private $user;

    /**
     * Create a test user before every test
     */
    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * Delete test user after every test
     */
    public function tearDown()
    {
        isset($this->user) && $this->user->delete();
        parent::tearDown();
    }

    /**
     * Assert that the test user can successfully login via the API
     */
    public function testUsersCanAuthenticate()
    {
        $payload = [
            'email' => $this->user->email,
            'password' => 'testing_password'
        ];

        $this->json('POST', '/api/v1/login', $payload)->assertStatus(200);
    }
}
