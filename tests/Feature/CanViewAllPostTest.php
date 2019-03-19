<?php

namespace Tests\Feature;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanViewAllPostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanViewAllPost()
    {
        $post1 = factory(Post::class)->create();
        $post2 = factory(Post::class)->create();
        $response = $this->get('posts');

        $response->assertStatus(200);
        $response->assertSee($post1->title);
        $response->assertSee(str_limit($post1->content));
        $response->assertSee($post2->title);
        $response->assertSee(str_limit($post2->content));
    }
}
