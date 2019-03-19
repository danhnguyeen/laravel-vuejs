<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AboutPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanViewAboutPage()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('About me');
    }
}
