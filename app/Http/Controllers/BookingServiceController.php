<?php

namespace App\Http\Controllers;

use App\BookingService;
use App\Booking;
use Illuminate\Http\Request;

class BookingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookingService::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookingService  $bookingService
     * @return \Illuminate\Http\Response
     */
    public function show(BookingService $bookingService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookingService  $bookingService
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingService $bookingService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookingService  $bookingService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingService $bookingService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookingService  $bookingService
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingService $bookingService)
    {
        //
    }

    public function findBookingServicesByBooking(Booking $booking)
    {
        $booking = Booking::findOrFail($booking->id);

        $bookings = BookingService::all()
            -> where('booking_id', $booking->id);

        /* $bookingServices = BookingService::all();
        $bookings = [];
        foreach ($bookingServices as $bs) {
            if ($bs->booking_id === $booking->id)
                $bookings[] = $bs;
        } */
        return $bookings ? $bookings : 'Not Found';
    }
}
