<?php

use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $services = App\Service::all();
        
        factory(App\Booking::class, 10)->create();
        App\Booking::All()->each(function ($booking) use ($services) {
            $booking->services()->saveMany($services);
        });   
    }
}
