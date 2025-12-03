<?php

namespace App\Livewire\Public;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Member;
use App\Models\Shift;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Throwable;

class CreateBooking extends Component
{

  #[Validate('required|string|max:199')]
  public ?string $name;

  #[Validate('required|string|max:199')]
  public ?string $surname;

  #[Validate('required|email|max:199')]
  public ?string $email;

  #[Validate('required|string')]
  public ?string $phone;

  #[Validate('required|integer|min:1')]
  public mixed $member_number;

  #[Validate('required|integer|min:1')]
  public mixed $number_of_guests;

  #[Validate('required|integer|exists:shifts,id')]
  public mixed $shift_id;

  #[Validate('nullable|integer|exists:members,id')]
  public mixed $member_id;

  #[Validate('required|string|date|date_format:Y-m-d|after:tomorrow|before:+2 months')]
  public ?string $date;

  #[Validate('nullable|string')]
  public ?string $observations;

  #[Computed]
  public function shifts(){
    return Shift::all();
  }

  public function render()
  {
      return view('livewire.public.create-booking')->extends('components.layouts.public')->section('content');
  }

  public function save(){
    $this->validate();
    $this->member_id = optional(Member::where('number', $this->member_number)->first())->id;

    if (Booking::where('shift_id', $this->shift_id)->where('date', $this->date)->whereNot('status_id', BookingStatus::CANCELLED)->exists()){
      $this->addError('shift_id', __('Existing booking'));
      $this->addError('date', __('Existing booking'));
      return;
    }

    try{

        $booking = Booking::create($this->all());
        $booking->status_id = BookingStatus::PENDING_CONFIRM;
        $booking->save();

        $booking->sendNotification();

      session()->flash('success', __('Booking saved succesfully'));
      $this->redirectRoute('showBooking', $booking->code);
    }catch(Throwable $e){
      session()->flash('error', __('Error while saving booking'));
      Log::error($e->getMessage());
      Log::error($e->getTraceAsString());
    }

  }
}
