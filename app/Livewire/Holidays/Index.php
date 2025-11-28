<?php

namespace App\Livewire\Holidays;

use App\Models\Holiday;
use Carbon\Carbon;
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
      return Holiday::where('date', '>=', Carbon::now())->orderBy('date', 'desc')->get();
    }
}
