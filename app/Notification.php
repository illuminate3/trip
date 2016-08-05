<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";

    protected $dates = ['created_at','updated_at','expires_on'];

    public function user()
    {
    	$this->belongsTo(User::class);
    }
    
}
