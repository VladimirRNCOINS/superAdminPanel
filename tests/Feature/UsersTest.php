<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /** @test */
    public function test_redirect_to_users_show_route_with_default_state_pagination()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/users');

        $response->assertStatus(302);
    }
}
