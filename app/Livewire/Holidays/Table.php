<?php

namespace App\Livewire\Holidays;

use App\Models\Holiday;
use App\Traits\DeleteHoliday;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Table extends Component
{

  use DeleteHoliday;

    public ?string $search = '';
    public function render()
    {
        return view('livewire.holidays.table');
    }

    #[Computed]
    public function holidays(){
      $search = $this->search;
      return Holiday::orderBy('date', 'desc')
      ->where('description', 'like', "%$search%")
      ->get();
    }
}
