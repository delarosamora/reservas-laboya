<?php

namespace App\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class Edit extends Component
{

  public Booking $booking;

  public function mount(Booking $booking){
    $this->booking = $booking;
  }

  public function render()
  {
      return view('livewire.bookings.edit');
  }
}
