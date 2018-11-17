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

    public function testCreatingAndroidAppsRequiresAuth()
    {
        $payload = [
            'name' => 'Lorem'
        ];

        $this->json('POST', '/api/v1/android_apps', $payload)
            ->assertStatus(401);
    }

    public function testAndroidAppsAreCreatedCorrectly()
    {

        $payload = [
            "name" => str_random(10),
            "description" => str_random(50),
            "version" => str_random(10),
            "price" => $this->faker->randomFloat(2, 0, 10),
            "avatar" => str_random(10)
        ];

        $user = factory(User::class)->create();

        $this->actingAs($user, 'api')->json('POST', '/api/v1/android_apps', $payload)
            ->assertStatus(201)
            ->assertJson($payload);
    }

    public function testAndroidAppDeletionsRequireAuth()
    {
        $this->json('DELETE', '/api/v1/android_apps/1')
            ->assertStatus(401);
    }
}
