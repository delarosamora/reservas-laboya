<?php

namespace App\Livewire\Bookings;

use App\Livewire\Public\CreateBooking;
use App\Models\Booking;
use App\Models\Holiday;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class PublicCalendar extends Calendar
{

  public array $extras = [];

    public function afterMount($extras = [])
    {
        $this->extras = $extras;
    }

  public function onEventClick($eventId, $holiday = false)
  {
    if ($holiday){
      $this->redirectRoute('showHoliday', $eventId, true, true);
    }
    else{
      $this->redirectRoute('showBooking', $eventId, true, true);
    }
  }

  public function onDayClick($year, $month, $day)
  {
    $date = Carbon::now()->setYear($year)->setMonth($month)->setDay($day)->format('Y-m-d');
    $this->dispatch('date-selected', date: $date)->to(CreateBooking::class);
  }
}
