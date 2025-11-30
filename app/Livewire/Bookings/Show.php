<?php

namespace App\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class Show extends Component
{

  public Booking $booking;

  public function mount(Booking $booking){
    $this->booking = $booking;
  }

  public function cancel(){
    $this->redirectRoute('admin.bookings.cancel', $this->booking->id);
  }

  public function confirm(){
    $this->redirectRoute('admin.bookings.confirm', $this->booking->id);
  }

  public function render()
  {
      return view('livewire.bookings.show');
  }
}
