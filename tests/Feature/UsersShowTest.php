<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersShowTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_show_pagination()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/users_show/1/25');

        $response->assertStatus(200);

        $response->assertViewIs('admin.users');
    }
}
