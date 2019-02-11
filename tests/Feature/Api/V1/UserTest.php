<?php

namespace Tests\Feature\Api\V1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use TCG\Voyager\Models\Role;

class UserTest extends TestCase
{
    use WithFaker;

    /**
     * Set up variables for every test.
     */
    public function setUp()
    {
        parent::setUp();

        $this->roles = [
            'admin' => Role::where('name', 'admin')->firstOrFail(),
            'vendor' => Role::where('name', 'vendor')->firstOrFail(),
            'user' => Role::where('name', 'user')->firstOrFail(),
        ];

        $this->users = [
            'admin' => User::where(
                'role_id',
                $this->roles['admin']->id
            )->firstOrFail(),
            'vendor' => User::where(
                'role_id',
                $this->roles['vendor']->id
            )->firstOrFail(),
            'user' => User::where(
                'role_id',
                $this->roles['user']->id
            )->firstOrFail()
        ];

        $this->testUser = factory(User::class)->create();
    }

    /**
     * Tear down after every test
     */
    public function tearDown()
    {
        $this->testUser->delete();
        parent::tearDown();
    }

    /**
     * No action can be completed without authentication.
     */
    public function testRequireAuth()
    {
        $this->json('POST', '/api/v1/users')->assertStatus(401);
        $this->json('GET', '/api/v1/users')->assertStatus(401);
        $this->json('GET', '/api/v1/users/1')->assertStatus(401);
        $this->json('PATCH', '/api/v1/users/1')->assertStatus(401);
        $this->json('DELETE', '/api/v1/users/1')->assertStatus(401);

        $this->json('POST', '/api/v1/users/1/avatar')->assertStatus(401);
        $this->json('GET', '/api/v1/users/1/avatar')->assertStatus(401);
    }

    /**
     * Users can be created.
     */
    public function testCanCreateUsers()
    {
        foreach ($this->users as $user) {
            $payload = [
                'name' => $this->faker->name,
                'email' => $this->faker->unique()->safeEmail,
                'password' => 'password',
            ];

            $res = $this->actingAs($user, 'api')
                ->json('POST', '/api/v1/users', $payload);

            switch ($user->role_id) {
                case $this->roles['admin']->id:
                    $res->assertStatus(201)->assertJsonStructure([
                        'data' => [
                            'id',
                            'name',
                            'email',
                            'created_at',
                            'updated_at',
                        ],
                    ]);
                    $resData = $res->getData()->data;
                    $createdUser = User::find($resData->id);
                    $createdUser->delete();
                    break;
                case $this->roles['vendor']->id:
                case $this->roles['user']->id:
                default:
                    $res->assertForbidden();
                    break;
            }
        }
    }

    /**
     * Users can be indexed.
     */
    public function testCanIndexUsers()
    {
        foreach ($this->users as $user) {
            $res = $this->actingAs($user, 'api')
                ->json('GET', '/api/v1/users')
                ->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        [
                            'id',
                            'name',
                            'email',
                            'created_at',
                            'updated_at',
                        ]
                    ],
                    'links',
                    'meta'
                ]);
        }
    }

    /**
     * Users can be viewed.
     */
    public function testCanViewUsers()
    {
        foreach ($this->users as $user) {
            $res = $this->actingAs($user, 'api')
                ->json('GET', "/api/v1/users/{$this->testUser->id}")
                ->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'name',
                        'email',
                        'created_at',
                        'updated_at',
                    ],
                ]);
        }
    }

    /**
     * Users can be updated.
     */
    public function testCanUpdateUsers()
    {
        foreach ($this->users as $user) {
            $payload = [
                'name' => $this->faker->name,
                'email' => $this->faker->unique()->safeEmail,
                'password' => 'password',
            ];

            $res = $this->actingAs($user, 'api')
                ->json('PATCH', "/api/v1/users/{$this->testUser->id}", $payload);

            switch ($user->role_id) {
                case $this->roles['admin']->id:
                    $res->assertStatus(200)->assertJsonStructure([
                        'data' => [
                            'id',
                            'name',
                            'email',
                            'created_at',
                            'updated_at',
                        ],
                    ]);
                    break;
                case $this->roles['vendor']->id:
                case $this->roles['user']->id:
                default:
                    $res->assertForbidden();
                    break;
            }
        }
    }

    /**
     * Users can be deleted.
     */
    public function testCanDeleteUsers()
    {
        foreach ($this->users as $user) {
            $testUser = factory(User::class)->create();

            $res = $this->actingAs($user, 'api')
                ->json('DELETE', "/api/v1/users/{$testUser->id}");

            switch ($user->role_id) {
                case $this->roles['admin']->id:
                    $res->assertStatus(204);
                    $this->assertNull(User::find($testUser->id));
                    break;
                case $this->roles['vendor']->id:
                case $this->roles['user']->id:
                default:
                    $res->assertForbidden();
                    $testUser->delete();
                    break;
            }
        }
    }

    /**
     * Users that don't exist can't be modified.
     */
    public function testNonExistingUsers()
    {
        foreach ($this->users as $user) {
            $this->actingAs($user, 'api')
                ->json('PATCH', "/api/v1/users/9999")
                ->assertStatus(404);

            $this->actingAs($user, 'api')
                ->json('DELETE', "/api/v1/users/9999")
                ->assertStatus(404);
        }
    }

    /**
     * The current user's information can be retrieved.
     */
    public function testCurrentUser()
    {
        foreach ($this->users as $user) {
            $this->actingAs($user, 'api')
                ->json('GET', "/api/v1/users/current")
                ->assertSuccessful()
                ->assertJson([
                    'data' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ]
                ]);
        }
    }
}
