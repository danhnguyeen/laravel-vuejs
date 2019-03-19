<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Post;

class ViewBlogPostTest extends TestCase
{
    /**
     * A basic feature test example.
     * @group view-post
     *
     * @return void
     */
    // use RefreshDatabase;
    public function testCanViewBlogTest()
    {
        $post = Post::create([
            'title' => 'A simple title',
            'content' => 'A simple content',
            'user_id' => 1
        ]);

        $response = $this->get("/post/$post->id");

        $response->assertStatus(200);
        $response->assertSee($post->title);
        $response->assertSee($post->content);
        $response->assertSee($post->created_at);
    }
    /**
     * Test 404 Post
     * @group post-not-found
     *
     * @return void
     */
    public function test404Post() {
        $response = $this->get("post/INVALID_ID");

        $response->assertStatus(404);
        $response->assertSee('Not Found');
    }
}
