<?php

namespace Tests\Unit;

use App\Dog;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class DogTest extends TestCase
{
    use WithFaker;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_show_dogs() {

        $response = $this->json('GET', '/api/dog');
        $response
            ->assertStatus(200);
    }

    public function test_can_create_dog()
    {
        $response = $this->json('POST', 'api/dog', ['name' => 'Lucas', 'age' => '2', 'weight' => '5', 'user_id' => 1]);
        $response
            ->assertStatus(201);
    }

}
