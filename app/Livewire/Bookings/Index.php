<?php

namespace App\Livewire\Bookings;

use Jenssegers\Agent\Agent;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.bookings.index')->with('agent', new Agent());
    }
}
