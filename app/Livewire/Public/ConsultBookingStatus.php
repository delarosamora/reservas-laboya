<?php

namespace App\Livewire\Public;

use App\Models\Booking;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ConsultBookingStatus extends Component
{

  #[Validate('string|exists:bookings,code')]
  public ?string $code;

  public function render()
  {
      return view('livewire.public.consult-booking-status')->extends('components.layouts.public')->section('content');
  }

  public function consult(){
    $this->validate();
    $this->redirectRoute('showBooking', $this->code);
  }
}
