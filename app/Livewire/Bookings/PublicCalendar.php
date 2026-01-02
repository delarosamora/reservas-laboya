<?php

namespace App\Livewire\Bookings;

use App\Livewire\Public\CreateBooking;
use App\Models\Booking;
use Carbon\Carbon;

class PublicCalendar extends Calendar
{

  public function onEventClick($eventId)
  {
    $booking = Booking::findOrFail($eventId);
    $this->redirectRoute('showBooking', $booking->id, true, true);
  }

  public function onDayClick($year, $month, $day)
  {
    $date = Carbon::now()->setYear($year)->setMonth($month)->setDay($day)->format('Y-m-d');
    $this->dispatch('date-selected', date: $date)->to(CreateBooking::class);
  }
}
