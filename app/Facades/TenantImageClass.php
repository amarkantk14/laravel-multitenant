<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class TenantImageClass extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tImage';
    }
}