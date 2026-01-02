<?php

namespace App\Livewire\Holidays;

use App\Models\Holiday;
use App\Traits\DeleteHoliday;
use Livewire\Component;

class Show extends Component
{

  use DeleteHoliday;

  public Holiday $holiday;

  public function mount(Holiday $holiday){
    $this->holiday = $holiday;
  }

  public function render()
  {
      return view('livewire.holidays.show');
  }
}
