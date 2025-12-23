<?php

namespace App\Livewire\Public;

use Jenssegers\Agent\Agent;
use Livewire\Component;

class ConsultBookingStatus extends Component
{

  public function render()
  {
      return view('livewire.public.consult-booking-status')->with('agent', new Agent())->extends('components.layouts.public')->section('content');
  }
}
