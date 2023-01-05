<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'dob', 'address', 'postcode', 'city', 'contact_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
