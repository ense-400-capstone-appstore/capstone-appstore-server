<?php

namespace Tests\Feature\Unit\Api\V1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\AndroidApp;

class AndroidAppTest extends TestCase
{
    use WithFaker;

    private $user;
    private $android_app;

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
        isset($this->android_app) && $this->android_app->delete();
        parent::tearDown();
    }

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

        $payload = [
            "name" => str_random(10),
            "description" => str_random(50),
            "version" => str_random(10),
            "price" => $this->faker->randomFloat(2, 0, 10),
            "avatar" => str_random(10)
        ];

        $res = $this->actingAs($this->user, 'api')
            ->json('POST', '/api/v1/android_apps', $payload)
            ->assertStatus(201)
            ->assertJson($payload);

        $this->android_app = AndroidApp::find($res->getData()->id);
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
