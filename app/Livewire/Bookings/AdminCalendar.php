<?php

namespace App\Livewire\Bookings;

use Illuminate\Support\Arr;

class AdminCalendar extends Calendar
{

  public function onEventClick($eventId, $holiday = false)
  {
      if ($holiday){
        $this->redirectRoute('admin.holidays.show', $eventId, true, true);
      }
      else{
        $this->redirectRoute('admin.bookings.show', $eventId, true, true);
      }
  }
}
