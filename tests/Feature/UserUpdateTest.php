<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserUpdateTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_update()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/user_update', [
                                                    'id' => 1,
                                                    'check_roles' => [1,2],
                                                    'active' => 1,
                                                    'publish' => 1
                                            ]);

        $user = \App\Models\User::where('id', 1)->first();
        $user->refresh();

        $this->assertEquals('1|2', $user->roles);

        $response->assertStatus(302);
    }
}
