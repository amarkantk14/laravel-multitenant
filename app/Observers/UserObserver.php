<?php
namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Orchestra\Tenanti\Observer;

class UserObserver extends Observer
{
    public function getDriverName()
    {
        return 'user';
    }

    /**
     * Run on created observer.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $entity
     *
     * @return bool
     */
    public function created(Model $entity)
    {
        /**
         * To create database on the user creation
         *
         */
        if (!$entity->is_super_admin) {
            $this->createTenantDatabase($entity);
        }


        /**
         * To create all migration
         */
        if (!$entity->is_super_admin) {
            parent::created($entity);
        }
    }

    /**
     * Create database for entity.
     *
     * @param  \Illuminate\Database\Eloquent\Model $entity
     * @return mixed
     * @throws InvalidArgumentException
     */
    protected function createTenantDatabase(Model $entity)
    {
        $connection = $entity->getConnection();
        $driver     = $connection->getDriverName();
        $id         = $entity->getKey();
        $db_prefix  = config('database.db_prefix');

        switch ($driver) {
            case 'mysql':
                $query = "CREATE DATABASE `{$db_prefix}_user_{$id}`";
                break;
            case 'pgsql':
                $query = "CREATE DATABASE {$db_prefix}_user_{$id}";
                break;
            default:
                throw new InvalidArgumentException("Database Driver [{$driver}] not supported");
        }
        return $connection->unprepared($query);
    }
}

// https://tutsforweb.com/laravel-passport-create-rest-api-with-authentication/
// https://tutsforweb.com/laravel-model-observers-tutorial/
// Ref: https://appdividend.com/2018/01/02/laravel-model-observers-tutorial-example/