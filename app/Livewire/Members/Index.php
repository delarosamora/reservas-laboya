<?php

namespace App\Livewire\Members;

use App\Models\Member;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.members.index');
    }

    #[Computed]
    public function members(){
      return Member::orderBy('number')->get();
    }
}
