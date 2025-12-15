<?php

namespace App\Livewire\Public;

use Livewire\Component;

class ConsultBookingStatus extends Component
{

  public function render()
  {
      return view('livewire.public.consult-booking-status')->extends('components.layouts.public')->section('content');
  }
}
