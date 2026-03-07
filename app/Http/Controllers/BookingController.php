<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Resources\BookingResource;
use Illuminate\Http\Request;

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
}
