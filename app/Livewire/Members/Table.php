<?php

namespace App\Livewire\Members;

use App\Models\Member;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.members.table');
    }

    #[Computed]
    public function members(){
      return Member::orderBy('number')->get();
    }
}
