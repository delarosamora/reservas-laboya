<?php

namespace App\Livewire\Bookings;

class AdminCalendar extends Calendar
{

  public function onEventClick($eventId)
  {
      $this->redirectRoute('admin.bookings.show', $eventId, true, true);
  }
}
