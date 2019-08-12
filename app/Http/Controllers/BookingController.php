<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Service;
use App\User;
use App\Dog;
use App\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Booking::all();
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
        $validatedData = Validator::make($request->all(), [
            'booking_date' => 'required',
            'day_price' => 'required'
        ]);

        if ($validatedData->fails()) {
            return $validatedData->messages()->first();
            // return response()
            // ->json(['message' => 'Validation failed'], 403);
        } else {
            Booking::create($request->all());
            return response()
            ->json(['message' => 'Booking created'], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $booking = Booking::findOrFail($booking->id);
        return $booking;
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
        $validatedData = Validator::make($request->all(), [
            'booking_date' => 'required|max:255',
            'day_price' => 'required'
        ]);
        
        if ($validatedData->fails()) {
            return response()
            ->json(['message' => 'Validation failed'], 403);
        } else {
            Booking::whereId($booking->id)->update($request->all());
            return response()
            ->json(['message' => 'Booking updated'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking = Booking::findOrFail($booking->id);
        $booking->delete();

        return response()->json(['message' => 'Booking deleted'], 200);
    }

    public function addservice(Request $request, Booking $booking) 
    {
        $booking = Booking::findOrFail($booking->id);
        $service = Service::findOrFail($request['service_id']);
        
    
        BookingService::create([
            'booking_id' => $booking->id,
            'service_id' => $service->id
        ]);

        return response()
        ->json(['message' => 'Service added to Booking'], 200);
    }

    public function findBookingByUser(User $user)
    {
        $user = User::findOrFail($user->id);
        $userDogs = Dog::all()
            ->where('user_id', $user->id);

              $bookings = Booking::all();
        $userBookings = [];

        foreach ($userDogs as $dog) {
            foreach ($bookings as $booking) {
                if ($dog->id === $booking->dog_id)
                    $userBookings[] = $booking;
            }
        } 

        return $userBookings ? $userBookings : 'Not Found';

    }
}
