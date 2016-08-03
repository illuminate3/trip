<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Infinite\Contracts\ContactsInterface;

class Contact extends Model implements ContactsInterface
{
    protected $table = "contacts";
    protected $fillable = ["zone",
        "district",
        "representative",
        "role",
        "address",
        "phone1",
        "phone2",
        "mobile",
        "email",
        "fax",
        "facebook",
        "website",
        "latitude",
        "longitude"
    ];

    public function contactable()
    {
        return $this->morphTo();
    }
}
