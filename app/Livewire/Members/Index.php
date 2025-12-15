<?php

namespace App\Livewire\Members;

use App\Models\Member;
use Jenssegers\Agent\Agent;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.members.index')->with('agent', new Agent());
    }
}
