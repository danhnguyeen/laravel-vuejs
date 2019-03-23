<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CMSTutorial\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @group auth-failed-exception
     *
     * @return void
     */
    public function testAuthFailedException()
    {
        $user = factory(User::class)->create();
        $response = $this->postJson('login', [
            'name' => $user->name,
            'password' => 'wrong password'
        ])->assertStatus(422)
        ->assertJson([
            'message' => 'These credentials do not match our records.'
        ]);
    }
}
