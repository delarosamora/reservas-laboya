<?php

namespace App\Livewire\Holidays;

use App\Models\Holiday;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.holidays.index')->with('agent', new Agent());
    }
}
