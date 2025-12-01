<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Throwable;

class BookingController extends Controller
{
    public function confirm(Booking $booking){

      try{
        Gate::authorize('confirm', $booking);

        $booking->status_id = BookingStatus::CONFIRMED;
        $booking->save();

        $booking->sendNotification();

        return redirect()->route('admin.bookings.show', $booking)->with('success', __('Booking confirmed succesfully'));

      }catch(Throwable $e){
        Log::error($e->getMessage());
        Log::error($e->getTraceAsString());
        return redirect()->back()->with('error', __('Error while confirming booking'));
      }

    }

    public function cancel(Booking $booking){

      try{
        Gate::authorize('cancel', $booking);

        $booking->status_id = BookingStatus::CANCELLED;
        $booking->save();

        $booking->sendNotification();

        return redirect()->route('admin.bookings.show', $booking)->with('success', __('Booking cancelled succesfully'));
      }catch(Throwable $e){
        Log::error($e->getMessage());
        Log::error($e->getTraceAsString());
        return redirect()->back()->with('error', __('Error while cancelling booking'));
      }

    }
}
