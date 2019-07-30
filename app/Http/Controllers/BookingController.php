<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $booking = Booking::all();
        return view('booking.index', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('booking.create');
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
        $validatedData = $request->validate([
            'booking_date' => 'required|max:255',
            'check-in_date' => 'required',
            'check-out_date' => 'required',
            'day_price' => 'required'
        ]);

        Booking::create($validatedData);

        return redirect(route('booking.index'))->with('success', 'booking is successfully created');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
        $booking = Booking::findOrFail($booking->id);
        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
        $booking = Booking::findOrFail($booking->id);
        return view('booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
        $validatedData = $request->validate([
            'booking_date' => 'required|max:255',
            'check-in_date' => 'required',
            'check-out_date' => 'required',
            'day_price' => 'required'
        ]);

        Booking::whereId($booking->id)->update($validatedData);

        return redirect(route('booking.index'))->with('success', 'booking is successfully updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
        $booking = Booking::findOrFail($booking->id);
        $booking->delete();

        return redirect(route('booking.index'))->with('success', 'booking is successfully deleted');;
    
    }
}
