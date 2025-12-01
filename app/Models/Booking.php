<?php

namespace App\Models;

use App\Events\BookingNotificationEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Booking extends Model
{

    use Notifiable;

    protected $table = 'bookings';
    protected $guarded = [];

    protected $casts = [
      'date' => 'date'
    ];

    protected static function booted(): void
    {
        static::creating(function (Booking $booking) {
            $booking->code = strtoupper(Str::random(8));
        });
    }

    #region RELATIONSHIPS
    public function member(){
      return $this->belongsTo(Member::class, 'member_id');
    }

    public function shift(){
      return $this->belongsTo(Shift::class, 'shift_id');
    }

    public function status(){
      return $this->belongsTo(BookingStatus::class, 'status_id');
    }
    #endregion

    public function sendNotification(){
      BookingNotificationEvent::dispatch($this);
    }

    public function isPendingConfirm(){
      return $this->status_id == BookingStatus::PENDING_CONFIRM;
    }

    public function isConfirmed(){
      return $this->status_id == BookingStatus::CONFIRMED;
    }

    public function isCancelled(){
      return $this->status_id == BookingStatus::CANCELLED;
    }
}
