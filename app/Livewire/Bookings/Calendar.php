<?php

namespace App\Livewire\Bookings;

use App\Models\Booking;
use App\Models\BookingStatus;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;

abstract class Calendar extends LivewireCalendar
{

  public function events() : Collection
  {
    return Booking::whereNot('status_id', BookingStatus::CANCELLED)->orderBy('date', 'desc')->orderBy('shift_id')->get()
    ->map(function ($booking) {
      return [
        'id' => $booking->id,
        'title' => $booking->name . ' ' . $booking->surname,
        'description' => $booking->shift->time,
        'date' => $booking->date,
      ];
    });
  }
}
