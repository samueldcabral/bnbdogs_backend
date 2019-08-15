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

        $data = [
            'booking_date' => '2019-08-14',
            'day_price' => 40.0,  
            'dog_id' => 1
        ];

        $response = $this->json('POST', '/api/booking', $data);
        $response->assertStatus(201);


    }

    public function test_can_show_bookings() {

        $response = $this->json('GET', '/api/booking');
        $response
            ->assertStatus(200);
    }
}
