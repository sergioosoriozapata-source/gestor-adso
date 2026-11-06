<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_root_redirects_to_aprendices(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect('/aprendices');
    }

    public function test_aprendices_index_returns_successful(): void
    {
        $response = $this->get('/aprendices');

        $response->assertStatus(200);
    }
}
