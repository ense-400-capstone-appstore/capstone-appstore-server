<?php

namespace Tests\Feature\Api\V1;

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
    public function testRequireAuth()
    {
        $this->json('POST', '/api/v1/android_apps')->assertStatus(401);
        $this->json('GET', '/api/v1/android_apps')->assertStatus(401);
        $this->json('GET', '/api/v1/android_apps/1')->assertStatus(401);
        $this->json('PATCH', '/api/v1/android_apps/1')->assertStatus(401);
        $this->json('DELETE', '/api/v1/android_apps/1')->assertStatus(401);

        $this->json('POST', '/api/v1/android_apps/1/avatar')->assertStatus(401);
        $this->json('GET', '/api/v1/android_apps/1/avatar')->assertStatus(401);

        $this->json('POST', '/api/v1/android_apps/1/file')->assertStatus(401);
        $this->json('GET', '/api/v1/android_apps/1/file')->assertStatus(401);
    }

    /**
     * AndroidApps can be created.
     */
    public function testCreate()
    {
        foreach ($this->users as $user) {
            $payload = [
                'name' => $this->faker->company,
                'version' => '1.0.0',
                'description' => $this->faker->text,
                'price' => $this->faker->randomFloat(2, 0, 10),
            ];

            $res = $this->actingAs($user, 'api')
                ->json('POST', '/api/v1/android_apps', $payload);

            switch ($user->role_id) {
                case $this->roles['admin']->id:
                    $res->assertStatus(201)->assertJson(['data' => $payload]);
                    $resData = $res->getData()->data;
                    $createdAndroidApp = AndroidApp::find($resData->id);
                    $createdAndroidApp->delete();
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
     * AndroidApps can be indexed.
     */
    public function testIndex()
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
                            'price',
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
     * AndroidApps can be shown.
     */
    public function testShow()
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
                        'price',
                        'created_at',
                        'updated_at',
                    ],
                ]);
        }
    }

    /**
     * AndroidApps can be updated.
     */
    public function testUpdate()
    {
        foreach ($this->users as $user) {
            $payload = [
                'name' => $this->faker->company,
                'version' => '1.0.0',
                'description' => $this->faker->text,
                'price' => $this->faker->randomFloat(2, 0, 10),
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
     * AndroidApps can be deleted.
     */
    public function testDelete()
    {
        foreach ($this->users as $user) {
            $androidApp = factory(AndroidApp::class)->create();

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
     * AndroidApps that don't exist can't be modified.
     */
    public function testNonExisting()
    {
        foreach ($this->users as $user) {
            $this->actingAs($user, 'api')
                ->json('PATCH', "/api/v1/android_apps/9999")
                ->assertStatus(404);

            $this->actingAs($user, 'api')
                ->json('DELETE', "/api/v1/android_apps/9999")
                ->assertStatus(404);
        }
    }
}
