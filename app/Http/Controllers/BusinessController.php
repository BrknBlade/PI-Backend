<?php

namespace App\Http\Controllers;

use App\Models\BookedHour;
use App\Models\Booking;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function business_info()
    {
        return Business::find(1);
    }

    public function booked_hours(Request $request) {
        $result = [];
        $bookings = Booking::where('date', $request->day)->select('hour')->get();

        foreach ($bookings as $booking) {
            array_push($result, $booking->hour);
        }

        return $result;
    }
}
