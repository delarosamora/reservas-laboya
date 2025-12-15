<?php

namespace App\Listeners;

use App\Events\BookingNotificationEvent;
use App\Notifications\BookingCancelled;
use App\Notifications\BookingConfirmed;
use App\Notifications\BookingPendingConfirm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BookingNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookingNotificationEvent $event): void
    {
        $booking = $event->booking;

        if (empty($booking->email)){
          return;
        }

        if ($booking->isPendingConfirm()){
          $booking->notify(new BookingPendingConfirm);
        }
        elseif($booking->isConfirmed()){
          $booking->notify(new BookingConfirmed);
        }
        elseif($booking->isCancelled()){
          $booking->notify(new BookingCancelled);
        }
    }
}
