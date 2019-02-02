<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStatusCode()
    {
        $res = $this->get('/home');

        $res->assertStatus(200);
    }

    public function testContent()
    {
        $res = $this->get('/home');

        $res->assertSeeText('Hello!');
    }
}
