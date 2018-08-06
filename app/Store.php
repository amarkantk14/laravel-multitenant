<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name', 'address', 'website', 'email', 'account', 'is_active'
    ];

    protected $hidden = [];
}
