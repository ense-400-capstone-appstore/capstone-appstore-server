<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenericTest extends TestCase
{
    /**
     * Ensure the application boots correctly.
     *
     * @return void
     */
    public function testAppBootsCorrectly()
    {
        $this->get('/')->assertStatus(200);
    }
}
