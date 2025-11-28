<?php

namespace App\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.bookings.index');
    }

    #[Computed]
    public function bookings(){
      return Booking::all();
    }
}
