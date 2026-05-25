<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
use App\Http\Requests\UpdateBusinessInfoRequest;
use App\Models\Booking;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function update(UpdateBusinessInfoRequest $request)
    {
        if(Auth::user()->role !== Roles::ADMIN && Auth::user()->role !== Roles::OWNER)
        {
            return response([
                'message' => 'Bro... Who are you?'
            ]);
        }

        $business = Business::find(1);
        $business->update($request->validated());

        return Business::find(1);
    }

    public function business_info()
    {
        if(Auth::user()->role !== Roles::ADMIN && Auth::user()->role !== Roles::OWNER)
        {
            return response([
                'message' => 'Bro... Who are you?'
            ]);
        }

        return Business::find(1);
    }

    public function booked_hours(Request $request)
    {
        if(Auth::user()->role !== Roles::ADMIN && Auth::user()->role !== Roles::OWNER)
        {
            return response([
                'message' => 'Bro... Who are you?'
            ]);
        }

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
        if(Auth::user()->role !== Roles::ADMIN && Auth::user()->role !== Roles::OWNER)
        {
            return response([
                'message' => 'Bro... Who are you?'
            ]);
        }

        $earnings = Booking::query()
            ->join('cut_types', 'bookings.cut_type_id', '=', 'cut_types.id')
            ->whereIn('bookings.status', ['pending', 'accepted'])
            ->sum('price');

        return $earnings;
    }
}
