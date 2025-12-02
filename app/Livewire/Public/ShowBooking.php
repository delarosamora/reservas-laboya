<?php

namespace App\Livewire\Public;

use App\Models\Booking;
use Livewire\Component;

class ShowBooking extends Component
{

  public Booking $booking;

  public function mount(string $code){
    $this->booking = Booking::where('code', $code)->firstOrFail();
  }

  public function render()
  {
      return view('livewire.public.show-booking')->extends('components.layouts.public')->section('content');
  }
}
