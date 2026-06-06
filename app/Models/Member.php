<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $guarded = [];

    #region RELATIONSHIPS
    public function bookings(){
      return $this->belongsTo(Booking::class, 'member_id');
    }
    #endregion

    public function getFullNameAttribute(){
      return $this->name . ' ' . $this->surname;
    }
}
