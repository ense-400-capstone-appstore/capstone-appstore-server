<?php

namespace Tests\Feature\Unit\Api\V1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use TCG\Voyager\Models\Role;
use App\AndroidApp;

class AndroidAppTest extends TestCase
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
    }

    /**
     * No action can be completed without authentication.
     */
    public function testActionsRequireAuthentication()
    {
        $this->json('GET', '/api/v1/android_apps/1')
            ->assertStatus(401);
        $this->json('GET', '/api/v1/android_apps')
            ->assertStatus(401);
        $this->json('PUT', '/api/v1/android_apps/1')
            ->assertStatus(401);
        $this->json('PATCH', '/api/v1/android_apps/1')
            ->assertStatus(401);
        $this->json('DELETE', '/api/v1/android_apps/1')
            ->assertStatus(401);
    }

    /**
     * AndroidApps can be viewed by users.
     */
    public function testUsersCanViewAndroidApps()
    {
        foreach ($this->users as $user) {
            $res = $this->actingAs($user, 'api')
                ->json('GET', '/api/v1/android_apps/1')
                ->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'name',
                        'description',
                        'version',
                        'price'
                    ],
                ]);
        }
    }

    /**
     * AndroidApps can be indexed by users.
     */
    public function testUsersCanIndexAndroidApps()
    {
        foreach ($this->users as $user) {
            $res = $this->actingAs($user, 'api')
                ->json('GET', '/api/v1/android_apps')
                ->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        [
                            'id',
                            'name',
                            'description',
                            'version',
                            'price'
                        ]
                    ],
                    'links',
                    'meta'
                ]);
        }
    }

    /**
     * AndroidApps can be created by users.
     */
    public function testUsersCanCreateAndroidApps()
    {
        foreach ($this->users as $user) {
            $payload = [
                "name" => str_random(10),
                "description" => str_random(50),
                "version" => str_random(10),
                "price" => $this->faker->randomFloat(2, 0, 10),
            ];

            $res = $this->actingAs($user, 'api')
                ->json('POST', '/api/v1/android_apps', $payload);

            switch ($user->role_id) {
                case $this->roles['admin']->id:
                    $res->assertStatus(201)->assertJson(['data' => $payload]);
                    $resData = $res->getData()->data;
                    $this->android_app = AndroidApp::find($resData->id);
                    $this->android_app->delete();
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
     * AndroidApps can be updated by users.
     */
    public function testUsersCanUpdateAndroidApps()
    {
        foreach ($this->users as $user) {
            $payload = [
                "name" => str_random(10),
                "description" => str_random(50),
                "version" => str_random(10),
                "price" => $this->faker->randomFloat(2, 0, 10),
            ];

            $res = $this->actingAs($user, 'api')
                ->json('PATCH', '/api/v1/android_apps/1', $payload);

            switch ($user->role_id) {
                case $this->roles['admin']->id:
                    $res->assertStatus(200)->assertJson([
                        'data' => $payload
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
     * AndroidApps can be deleted by users.
     */
    public function testUsersCanDeleteAndroidApps()
    {
        foreach ($this->users as $user) {
            $androidApp = AndroidApp::create([
                "name" => str_random(10),
                "description" => str_random(50),
                "version" => str_random(10),
                "price" => $this->faker->randomFloat(2, 0, 10),
            ]);

            $res = $this->actingAs($user, 'api')
                ->json('DELETE', "/api/v1/android_apps/{$androidApp->id}");

            switch ($user->role_id) {
                case $this->roles['admin']->id:
                    $res->assertStatus(204);
                    $this->assertNull(AndroidApp::find($androidApp->id));
                    break;
                case $this->roles['vendor']->id:
                case $this->roles['user']->id:
                default:
                    $res->assertForbidden();
                    $androidApp->delete();
                    break;
            }
        }
    }

    /**
     * AndroidApps that don't exist can't be deleted by users.
     */
    public function testUsersCantDeleteNonExistantAndroidApps()
    {
        foreach ($this->users as $user) {
            $res = $this->actingAs($user, 'api')
                ->json('DELETE', "/api/v1/android_apps/9999");

            $res->assertStatus(302);
        }
    }
}
