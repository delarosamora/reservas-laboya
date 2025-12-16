<?php

namespace App\Livewire\Public;

use App\Models\Booking;
use App\Models\BookingStatus;
use Livewire\Component;
use Throwable;

class ShowBooking extends Component
{

  public Booking $booking;

  public function mount(Booking $booking){
    $this->booking = $booking;
  }

  public function cancel(){
    try{
      $booking = $this->booking;
      $booking->status_id = BookingStatus::CANCELLED;
      $booking->save();

      $booking->sendNotification();
      session()->flash('success', __('Booking cancelled succesfully'));
    }catch(Throwable $e){
        Log::error($e->getMessage());
        Log::error($e->getTraceAsString());
        session()->flash('success', __('Error while cancelling booking'));
      }
  }

  public function render()
  {
      return view('livewire.public.show-booking')->extends('components.layouts.public')->section('content');
  }
}
