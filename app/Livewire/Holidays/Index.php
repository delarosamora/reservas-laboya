<?php

namespace App\Livewire\Holidays;

use App\Models\Holiday;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.holidays.index');
    }

    #[Computed]
    public function holidays(){
      return Holiday::all();
    }
}
