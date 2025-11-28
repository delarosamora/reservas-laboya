<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $guarded = [];

    protected $casts = [
      'date' => 'date'
    ];

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
}
