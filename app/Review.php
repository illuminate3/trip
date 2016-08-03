<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";

    protected $fillable = [ "rating","review","user_id" ];

    public function reviewable()
    {
        return $this->morphTo();
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
