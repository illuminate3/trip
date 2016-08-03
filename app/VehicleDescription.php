<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleDescription extends Model
{
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
