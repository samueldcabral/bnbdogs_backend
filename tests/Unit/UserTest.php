<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_can_show_users() {

        $response = $this->json('GET', '/api/user');
        $response
            ->assertStatus(200);
    }

    public function test_can_create_user()
    {

        $response = $this->json('POST', '/api/user', ['name' => 'Lucas7', 'email' => 'a7@a', 'password' => '12345678', 'password_confirmation' => '12345678']);
        $response
        ->assertStatus(201);
    }

}
