<?php

namespace Tests\Unit;

use App\Booking;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class BookingTest extends TestCase
{
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_create_booking()
    {
        // $faker = Faker::makeFaker();

        $data = [
            'booking_date' => strval($this->faker->date($format = 'Y-m-d', $max = 'now')),
            'day_price' => strval($this->faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 100)),  
        ];
        print_r($data);
        $this->post(route('booking.store'), $data)
        ->assertStatus(201);


    }

    public function test_can_show_bookings() {

        $response = $this->json('GET', '/api/booking');
        $response
            ->assertStatus(200);
    }
}
