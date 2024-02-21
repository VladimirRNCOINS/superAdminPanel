<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserSearchTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_search()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/user_search', [
            'name' => 'алек'
        ]);

        $response->assertStatus(200);
    }
}
