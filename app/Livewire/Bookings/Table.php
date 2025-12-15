<?php

namespace App\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.bookings.table');
    }

    #[Computed]
    public function bookings(){
      return Booking::orderBy('date', 'desc')->get();
    }
}
