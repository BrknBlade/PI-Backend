<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBusinessInfoRequest;
use App\Models\Booking;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function update(UpdateBusinessInfoRequest $request)
    {
        $business = Business::find(1);
        $business->update($request->validated());

        return Business::find(1);
    }

    public function business_info()
    {
        return Business::find(1);
    }

    public function booked_hours(Request $request)
    {
        $result = [];
        $bookings = Booking::where('date', $request->day)->select('hour')->get();

        foreach ($bookings as $booking)
        {
            array_push($result, $booking->hour);
        }

        return $result;
    }

    public function earnings()
    {
        $earnings = Booking::query()
            ->join('cut_types', 'bookings.cut_type_id', '=', 'cut_types.id')
            ->whereIn('bookings.status', ['pending', 'accepted'])
            ->sum('price');

        return $earnings;
    }
}
