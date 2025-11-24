<?php

namespace App\Livewire\Members;

use App\Models\Member;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Throwable;

class Form extends Component
{

  public ?Member $member = null;

  #[Validate('required|string|max:199')]
  public ?string $name;

  #[Validate('required|string|max:199')]
  public ?string $surname;

  #[Validate('required|email|max:199')]
  public ?string $email;

  #[Validate('required|string')]
  public ?string $phone;

  #[Validate('required|integer|min:1')]
  public mixed $number;

  public function render()
  {
      return view('livewire.members.form');
  }

  public function save(){
    $this->validate();

    try{
      Member::create($this->except('member'));
      dd($this->all());
    }catch(Throwable $e){
      Log::error($e->getMessage());
      Log::error($e->getTraceAsString());
    }

  }
}
