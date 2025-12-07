<?php

namespace App\Livewire\Holidays;

use App\Models\Holiday;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Throwable;

class Form extends Component
{

  public ?Holiday $holiday = null;

  #[Validate('required|string|date|date_format:Y-m-d')]
  public ?string $date;

  #[Validate('nullable|string')]
  public ?string $description;

  public function mount(?Holiday $holiday = null){
    if (!is_null($holiday->id)){
      $this->holiday = $holiday;
      $this->date = $this->holiday->date->format('Y-m-d');
      $this->description = $this->holiday->description;
    }
  }

  public function render()
  {
      return view('livewire.holidays.form');
  }

  public function save(){
    $this->validate();

    if(is_null($this->holiday)){
      $query = Holiday::query();
    }
    else{
      $query = Holiday::whereKeyNot($this->holiday->id);
    }

    if ($query->where('date', $this->date)->exists()){
      $this->addError('date', __('Existing holiday'));
      return;
    }

    try{

      if (is_null($this->holiday)){
        $this->holiday = Holiday::create($this->except('holiday'));
      }else{
        $this->holiday->update($this->except('holiday'));
      }

      session()->flash('success', __('Holiday saved succesfully'));
      $this->redirectRoute('admin.holidays.show', $this->holiday->id, true, true);
    }catch(Throwable $e){
      session()->flash('error', __('Error while saving holiday'));
      Log::error($e->getMessage());
      Log::error($e->getTraceAsString());
    }

  }
}
