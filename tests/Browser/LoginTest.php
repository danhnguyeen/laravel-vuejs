<?php

namespace Tests\Browser;

use App\User;
use App\Post;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @group login
     *
     * @return void
     */
    public function testUserCanLogin()
    {
        $user = factory(User::class)->create([
            'name' => 'ThanhDanh',
            'email' => 'test@gmail.com'
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('name', 'ThanhDanh')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/cms_tutorial/public/login');
        });
    }
    /**
     * @group view-post
     *
     * @return void
     */
    public function testUserCanViewAPost()
    {
        $post = factory(Post::class)->create();

        $this->browse(function (Browser $browser) use ($post) {
            $browser->visit('/posts')
                    ->clickLink('View Details')
                    ->assertPathIs("/cms_tutorial/public/post/$post->id")
                    ->assertSee($post->title);
        });
    }
}
