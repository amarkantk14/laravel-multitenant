<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Auth;

trait AuthTrait
{
    public function __construct() {}
    /**
     * @return bool
     */
    public function isAdmin() {
        return Auth::user()->is_admin == true;
    }

    /**
     * @return bool
     */
    public function isSuperAdmin() {
        return Auth::user()->is_super_admin == true;
    }

    public function loggedInUser()
    {
        return Auth::user();
    }
}