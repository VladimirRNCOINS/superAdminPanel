<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditUserTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_find_user()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/edit_user/948');

        $response->assertStatus(200);

        $response->assertViewIs('admin.user');
    }
}
