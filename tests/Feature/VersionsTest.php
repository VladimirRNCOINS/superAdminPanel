<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VersionsTest extends TestCase
{
    use WithoutMiddleware;

    /** @test */
    public function test_versions()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/versions');

        $response->assertViewIs('admin.versions');
    }
}
