<?php

namespace App\Livewire\Bookings;

use App\Livewire\Public\CreateBooking;
use App\Models\Booking;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class PublicCalendar extends LivewireCalendar
{

  public function events() : Collection
  {
    return Booking::orderBy('date', 'desc')->orderBy('shift_id')->get()
    ->map(function ($booking) {
      return [
        'id' => $booking->id,
        'title' => $booking->name . ' ' . $booking->surname,
        'description' => $booking->shift->time,
        'date' => $booking->date,
      ];
    });
  }

  public function onDayClick($year, $month, $day)
  {
    $date = Carbon::now()->setYear($year)->setMonth($month)->setDay($day)->format('Y-m-d');
    $this->dispatch('date-selected', date: $date)->to(CreateBooking::class);
  }
}
