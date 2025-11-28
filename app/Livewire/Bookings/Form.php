<?php

namespace App\Livewire\Bookings;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Member;
use App\Models\Shift;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Throwable;

class Form extends Component
{

  public ?Booking $booking = null;

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

  #[Validate('required|string|date|date_format:Y-m-d')]
  public ?string $date;

  #[Validate('nullable|string')]
  public ?string $observations;


  public function mount(?Booking $booking = null){
    if (!is_null($booking->id)){
      $this->booking = $booking;
      $this->name = $this->booking->name;
      $this->surname = $this->booking->surname;
      $this->email = $this->booking->email;
      $this->phone = $this->booking->phone;
      $this->member_number = $this->booking->member_number;
      $this->number_of_guests = $this->booking->number_of_guests;
      $this->date = $this->booking->date->format('Y-m-d');
      $this->shift_id = $this->booking->shift_id;
      $this->member_id = $this->booking->member_id;
    }
  }

  #[Computed]
  public function members(){
    return Member::orderBy('number')->get();
  }

  public function updated($property)
    {
        // $property: The name of the current property that was updated

        if ($property === 'member_id') {
          if (!is_null($member = Member::find($this->member_id))){
            $this->name = $member->name;
            $this->surname = $member->surname;
            $this->email = $member->email;
            $this->member_number = $member->number;
            $this->phone = $member->phone;
          }
        }
    }

  #[Computed]
  public function shifts(){
    return Shift::all();
  }

  public function render()
  {
      return view('livewire.bookings.form');
  }

  public function save(){
    $this->validate();

    if(is_null($this->booking)){
      $query = Booking::query();
    }
    else{
      $query = Booking::whereKeyNot($this->booking->id);
    }

    if ($query->where('shift_id', $this->shift_id)->where('date', $this->date)->exists()){
      $this->addError('shift_id', __('Existing booking'));
      $this->addError('date', __('Existing booking'));
      return;
    }

    try{

      if (is_null($this->booking)){
        $this->booking = Booking::create($this->except('booking'));
        $this->booking->status_id = BookingStatus::PENDING_CONFIRM;
        $this->booking->save();
      }else{
        $this->booking->update($this->except('booking'));
      }

      session()->flash('success', __('Booking saved succesfully'));
      $this->redirectRoute('admin.bookings.show', $this->booking->id);
    }catch(Throwable $e){
      Log::error($e->getMessage());
      Log::error($e->getTraceAsString());
    }

  }
}
