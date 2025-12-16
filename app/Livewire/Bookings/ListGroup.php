<?php

namespace App\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ListGroup extends Component
{

    public ?string $search = '';
    public function render()
    {
        return view('livewire.bookings.list-group');
    }

    #[Computed]
    public function bookings(){
      $search = $this->search;
      return Booking::orderBy('date', 'desc')
      ->where('name', 'like', "%$search%")
      ->orWhere('surname', 'like', "%$search%")
      ->orWhere('email', 'like', "%$search%")
      ->orWhere('phone', 'like', "%$search%")
      ->orWhere('nif', 'like', "%$search%")
      ->get();
    }
}
