<?php

namespace App;

class Role extends \Spatie\Permission\Models\Role
{
    const SUPER_ADMIN_ID = 2;
    const SUPER_ADMIN_NAME = 'super-admin';
}
