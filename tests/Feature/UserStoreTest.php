<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserStoreTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_store()
    {
        $this->withoutExceptionHandling();

        $timemark = microtime(true);
        //dd($timemark);
        $response = $this->post('/user_store', [
                                                    'name' => 'UserTest',
                                                    'email' => 'test100@'.$timemark.'.com',
                                                    'password' => 'gdsuamvl360',
                                                    'check_roles' => ['3','4'],
                                                    'active' => '1',
                                                    'publish' => '1',
                                            ]);

        $response->assertStatus(302);
    }
}
