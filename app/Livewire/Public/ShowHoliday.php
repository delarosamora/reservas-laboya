<?php

namespace App\Livewire\Public;

use App\Models\Holiday;
use Livewire\Component;

class ShowHoliday extends Component
{

  public Holiday $holiday;

  public function mount(Holiday $holiday){
    $this->holiday = $holiday;
  }

  public function render()
  {
      return view('livewire.public.show-holiday')->extends('components.layouts.public')->section('content');
  }
}
