<?php

namespace App\Livewire\Public;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Holiday;
use App\Models\Shift;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditBooking extends Component
{

  public Booking $booking;

  #[Validate('required|integer|exists:shifts,id')]
  public mixed $shift_id;

  #[Validate('required|string|date|date_format:Y-m-d|after:tomorrow|before:+2 months')]
  public ?string $date = null;

  public function mount(Booking $booking){
    $this->booking = $booking;
  }

    #[Computed]
  public function shifts(){
    return Shift::all();
  }

  public function render()
  {
      return view('livewire.public.edit-booking')->extends('components.layouts.public')->section('content');
  }

    public function save(){
    $this->validate();

    if (Booking::where('shift_id', $this->shift_id)->where('date', $this->date)->whereNot('status_id', BookingStatus::CANCELLED)->exists()){
      $this->addError('shift_id', __('Existing booking'));
      $this->addError('date', __('Existing booking'));
      return;
    }

      if (Holiday::where('date', $this->date)->exists()){
      $this->addError('date', __('Existing holiday'));
      return;
    }

    try{

        $this->booking->date = $this->date;
        $this->booking->shift_id = $this->shift_id;
        $this->booking->save();
        $this->booking->sendNotification();

      session()->flash('success', __('Booking saved succesfully'));
      $this->redirectRoute('showBooking', $this->booking->id, true, true);
    }catch(Throwable $e){
      session()->flash('error', __('Error while saving booking'));
      Log::error($e->getMessage());
      Log::error($e->getTraceAsString());
    }

  }
}
