<?php

namespace App\Livewire\Members;

use App\Models\Member;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Table extends Component
{

    public ?string $search = '';
    public function render()
    {
        return view('livewire.members.table');
    }

    #[Computed]
    public function members(){
      $search = $this->search;
      return Member::orderBy('number')
      ->where('name', 'like', "%$search%")
      ->orWhere('surname', 'like', "%$search%")
      ->orWhere('email', 'like', "%$search%")
      ->orWhere('phone', 'like', "%$search%")
      ->orWhere('nif', 'like', "%$search%")
      ->get();
    }
}
