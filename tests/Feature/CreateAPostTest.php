<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateAPostTest extends TestCase
{
    /**
     * @group create-post
     *
     * @return void
     */
    public function testCanCreateAPost()
    {
        $response = $this->post('posts', [
            'title' => 'Test Title',
            'content' => 'Test content',
            'user_id' => 1
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Title',
            'content' => 'Test content'
        ]);
    }
    /**
     * @group validate-create-post
     *
     * @return void
     */
    public function testTitleIsRequiredWhenCreatePost() {
        $response = $this->post('posts', [
            'title' => null,
            'content' => 'Test content',
            'user_id' => 1
        ]);

        $response->assertSessionHasErrors('title');
    }
}
