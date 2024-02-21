<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateVersionTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_version()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/create_version');

        $this->assertDatabaseHas('enlk_versions', [
            'version' => \App\Models\Version::orderby('id', 'desc')->first()->version
        ]);

        $response->assertStatus(302);
    }
}
