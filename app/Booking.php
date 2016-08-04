<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	protected $fillable = ['from','to','booked_on'];
	protected $table = 'bookings';
	protected $dates = ['created_at', 'updated_at','from','to','booked_on'];
}
