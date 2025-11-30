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

  public function mount(?Member $member = null){
    if (!is_null($member->id)){
      $this->member = $member;
      $this->name = $this->member->name;
      $this->surname = $this->member->surname;
      $this->email = $this->member->email;
      $this->phone = $this->member->phone;
      $this->number = $this->member->number;
    }
  }

  public function render()
  {
      return view('livewire.members.form');
  }

  public function save(){
    $this->validate();

    $query = is_null($this->member) ? Member::query() : Member::whereKeyNot($this->member->id);

    if ($query->where('number', $this->number)->exists()){
      $this->addError('number', __('Existing member'));
      return;
    }

    try{

      if (is_null($this->member)){
        $this->member = Member::create($this->except('member'));
      }else{
        $this->member->update($this->except('member'));
      }

      session()->flash('success', __('Member saved succesfully'));
      $this->redirectRoute('admin.members.show', $this->member->id);
    }catch(Throwable $e){
      Log::error($e->getMessage());
      Log::error($e->getTraceAsString());
    }

  }
}
