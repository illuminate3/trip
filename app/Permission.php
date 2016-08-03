<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /*
   |--------------------------------------------------------------------------
   | Table
   |--------------------------------------------------------------------------
   */
    protected $table = "permissions";
    /*
   |--------------------------------------------------------------------------
   | Relationship Model
   |--------------------------------------------------------------------------
   */

    /**
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


}
