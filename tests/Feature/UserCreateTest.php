<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCreateTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_create()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/create_user');

        $response->assertStatus(200);

        $response->assertViewIs('admin.user');
    }
}
