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
        // $faker = Faker::makeFaker();

        $data = [
            'name' => $this->faker->name,
            'weight' => $this->faker->name,  
        ];

        print_r($data);

        // $this->post(route('dog.store'), $data)
        // ->assertStatus(201);
        $response = $this->call('POST', 'api/dog', ['name' => $this->faker->name, 'weight' => $this->faker->numberBetween($min = 1, $max = 100)]);
        // $response = $this->json('POST', 'api/dog', ['name' => $this->faker->name, 'weight' => $this->faker->numberBetween($min = 1, $max = 100)]);
        $response
        ->assertStatus(201);
    }

}
