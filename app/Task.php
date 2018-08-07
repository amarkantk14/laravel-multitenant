<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Task extends Model
{
    use HasRoles;
    protected $guard_name = 'web';

    protected $fillable = ['task_name', 'completed'];
}
