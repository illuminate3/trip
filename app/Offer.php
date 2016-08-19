<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = ['image', 'title', 'price_before', 'price_after', 'from', 'to'];

    public function offerable()
    {
        return $this->morphTo();
    }

}
