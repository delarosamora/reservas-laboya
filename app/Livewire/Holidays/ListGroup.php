<?php

namespace App\Livewire\Holidays;

use App\Models\Holiday;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ListGroup extends Component
{

    public ?string $search = '';
    public function render()
    {
        return view('livewire.holidays.list-group');
    }

    #[Computed]
    public function holidays(){
      $search = $this->search;
      return Holiday::orderBy('date', 'desc')
      ->where('description', 'like', "%$search%")
      ->get();
    }
}
