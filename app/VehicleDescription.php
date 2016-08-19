<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleDescription extends Model
{
    protected $fillable = [
        'type',
        'price',
        'doors',
        'max_people',
        'manufacturer',
        'mileage',
        'description',
        'air_conditioned',
        'vehicle_id'
    ];
    protected $table = 'vehicle_descriptions';

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
