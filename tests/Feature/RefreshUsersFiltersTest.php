<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RefreshUsersFiltersTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_refresh_users_filters()
    {
        $this->withoutExceptionHandling();

        $response = $this->withSession(['show_users_filters' => [
            'role' => '7',
            'active' => '1',
            'publish' => '1'
        ]])->get('/refresh_users_filters');

        $response->assertStatus(302);
    }
}
