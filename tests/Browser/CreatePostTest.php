<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePostTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @group create-post
     *
     * @return void
     */
    public function testUserCanCreatePost()
    {
        $user = factory(User::class)->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/create-post')
                    ->type('title', 'Test title')
                    ->type('content', 'Test content')
                    ->press('Save')
                    ->assertPathIs('/cms_tutorial/public/posts')
                    ->assertSee('Test title');
        });
    }
}
