<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, ShinobiTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function vehicles()
    {
        return $this->has(Vehicle::class, 'user_id');
    }

    public function venues()
    {
        return $this->has(Venue::class, 'user_id');
    }

    public function restaurants()
    {
        return $this->has(Restaurant::class, 'user_id');
    }

    public function hotels()
    {
        return $this->has(Hotel::class, 'user_id');
    }
    
    public function tours()
    {
        return $this->has(Tour::class, 'user_id');
    }
    public function notifications()
    {
        return $this->has(Notification::class, 'user_id');
    }

}
