<?php

namespace App\Livewire\Members;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Throwable;

class Create extends Component
{

  public function render()
  {
      return view('livewire.members.create');
  }
}
