<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /* show all booking based on user/admin activity */
    public function index()
    {
        if(Auth::user()->role == 'admin') {
            $bookings = Booking::all();
            return response()->json($bookings);
        } else {
            $bookings = User::find(Auth::user()->id)->bookings;
            return response()->json($bookings);
        }
    }

    /* show specific booking */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return response()->json($booking);
    }

    /* create new booking */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required',
            'status' => 'required|string|max:255',
        ]);

        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'status' => $request->status
        ]);

        return response()->json($booking);
    }
}
