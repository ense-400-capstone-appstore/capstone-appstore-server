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
     * AndroidApps cannot be created without authentication
     */
    public function testCreatingAndroidAppsRequiresAuth()
    {
        $payload = [
            'name' => 'Lorem'
        ];

        $this->json('POST', '/api/v1/android_apps', $payload)
            ->assertStatus(401);
    }

    /**
     * AndroidApps must be created correctly with correct input
     */
    public function testAndroidAppsAreCreatedCorrectly()
    {
        $role = Role::where('name', 'admin')->firstOrFail();
        $user = User::where('role_id', $role->id)->firstOrFail();

        $payload = [
            "name" => str_random(10),
            "description" => str_random(50),
            "version" => str_random(10),
            "price" => $this->faker->randomFloat(2, 0, 10),
        ];

        $res = $this->actingAs($user, 'api')
            ->json('POST', '/api/v1/android_apps', $payload)
            ->assertStatus(201)
            ->assertJson(['data' => $payload]);

        $resData = $res->getData()->data;

        $this->android_app = AndroidApp::find($resData->id);
    }

    /**
     * AndroidApps cannot be deleted without authentication
     */
    public function testAndroidAppDeletionsRequireAuth()
    {
        $this->json('DELETE', '/api/v1/android_apps/1')
            ->assertStatus(401);
    }
}
