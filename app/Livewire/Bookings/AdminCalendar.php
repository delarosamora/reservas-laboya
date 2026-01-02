<?php

namespace App\Livewire\Bookings;

use Illuminate\Support\Arr;

class AdminCalendar extends Calendar
{

  public function onEventClick($eventId)
  {
      $event = Arr::first($this->events(), fn ($event) => $event['id'] == $eventId);
      if (Arr::get($event, 'holiday', false)){
        $this->redirectRoute('admin.holidays.show', $eventId, true, true);
      }
      else{
        $this->redirectRoute('admin.bookings.show', $eventId, true, true);
      }
  }
}
