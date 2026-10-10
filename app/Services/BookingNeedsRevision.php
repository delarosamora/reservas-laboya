<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\BookingStatus;

class BookingNeedsRevision{

  public static function run(Booking $booking){
    $numberOfGuests = $booking->number_of_guests;
    $date = $booking->date;
    $nextDay = $date->copy()->addDay();
    $previousDay = $date->copy()->subDay();

    return $numberOfGuests >= 12 && (Booking::whereNot('status_id', BookingStatus::CANCELLED)->whereNot('shift_id', $booking->shift_id)->where('date', $date)->exists() || Booking::whereNot('status_id', BookingStatus::CANCELLED)->where('shift_id', '<', $booking->shift_id)->where('date', $nextDay)->exists() || Booking::whereNot('status_id', BookingStatus::CANCELLED)->where('shift_id', '>', $booking->shift_id)->where('date', $previousDay)->exists())
    || Booking::whereNot('status_id', BookingStatus::CANCELLED)->whereNot('shift_id', $booking->shift_id)->where('date', $date)->where('number_of_guests', '>=', 12)->exists() || Booking::whereNot('status_id', BookingStatus::CANCELLED)->where('shift_id', '>', $booking->shift_id)->where('date', $previousDay)->where('number_of_guests', '>=', 12)->exists() || Booking::whereNot('status_id', BookingStatus::CANCELLED)->where('shift_id', '<', $booking->shift_id)->where('date', $nextDay)->where('number_of_guests', '>=', 12)->exists();
  }

}
