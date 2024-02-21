<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserFiltersTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_filters()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/user_filters', [
            'role' => 3,
            'active' => 1,
            'publish' => 1
        ]);

        $response->assertStatus(302);
    }
}
