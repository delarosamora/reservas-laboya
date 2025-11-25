<?php

namespace App\Livewire\Members;

use App\Models\Member;
use Livewire\Component;

class Edit extends Component
{

  public Member $member;

  public function mount(Member $member){
    $this->member = $member;
  }

  public function render()
  {
      return view('livewire.members.edit');
  }
}
