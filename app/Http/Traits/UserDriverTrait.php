<?php
namespace App\Http\Traits;

use Orchestra\Support\Facades\Tenanti;

trait UserDriverTrait
{
    protected $db_prefix;

    public function __construct() {
        $this->db_prefix = config('database.db_prefix');
    }

    /**
     * @param $user
     */
    public function userDriverSetup($user)
    {
        Tenanti::driver('user')->asDefaultConnection($user, $this->db_prefix . '_user_{id}');
    }
}