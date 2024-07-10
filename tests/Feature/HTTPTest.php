<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HTTPTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_basic_test_laravel_testing(): void
    {
        $response = $this->get('/');

        $response->dumpHeaders();

        $response->dumpSession();

        $response->assertStatus(200);
    }




}
