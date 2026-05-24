<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Resources\BookingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 1 || $user->role === 2 || $user->role === 3) {
            $bookings = Booking::all();
        } else {
            $bookings = Booking::where('user_id', $user->id)->get();
        }

        return BookingResource::collection($bookings);
    }

    public function store(StoreBookingRequest $request)
    {
        $booking = Booking::create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
            'status'  => 'pending',
        ]);

        return new BookingResource($booking);
    }

    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);

        return new BookingResource($booking);
    }

    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $this->authorize('update', $booking);

        $booking->update($request->validated());

        return new BookingResource($booking);
    }

    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);

        $booking->delete();

        return response()->noContent();
    }

    public function week_bookings(Request $request) {
        if(Auth::user()->role !== Roles::ADMIN && Auth::user()->role !== Roles::OWNER)
        {
            return response([
                'message' => 'Bro... Who are you?'
            ]);
        }

        $bookings = Booking::where('date', '>=', $request->start_date)
            ->where('date', '<=', $request->end_date)
            ->get();

        return BookingResource::collection($bookings);
    }

    public function cancelled_bookings()
    {
        if(Auth::user()->role !== Roles::ADMIN && Auth::user()->role !== Roles::OWNER)
        {
            return response([
                'message' => 'Bro... Who are you?'
            ]);
        }

        $cancelled_bookings = Booking::where('status', '=', 'cancelled')
            ->count();

        return $cancelled_bookings;
    }

    public function accepted_bookings()
    {
        if(Auth::user()->role !== Roles::ADMIN && Auth::user()->role !== Roles::OWNER)
        {
            return response([
                'message' => 'Bro... Who are you?'
            ]);
        }

        $accepted_bookings = Booking::where('status', '=', 'accepted')
            ->count();

        return $accepted_bookings;
    }
}
