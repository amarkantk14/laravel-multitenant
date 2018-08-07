<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Store extends Model
{
    use HasRoles;
    protected $guard_name = 'web';

    protected $fillable = [
        'name', 'address', 'website', 'email', 'account', 'is_active'
    ];

    protected $hidden = [];
}
