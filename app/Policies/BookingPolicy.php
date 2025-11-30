<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;

class BookingPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function confirm(User $user, Booking $booking){
      return $booking->isPendingConfirm();
    }

    public function cancel(User $user, Booking $booking){
      return $booking->isPendingConfirm() || $booking->isCancelled();
    }
}
