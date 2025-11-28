<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    protected $table = 'booking_statuses';

    public $timestamps = false;

    public const PENDING_CONFIRM = 1;
    public const CONFIRMED = 2;
    public const CANCELLED = 3;
}
