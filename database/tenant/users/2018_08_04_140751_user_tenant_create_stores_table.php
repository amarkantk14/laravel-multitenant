<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Orchestra\Tenanti\Migration;
use Illuminate\Database\Eloquent\Model;

class UserTenantCreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @param  string|int  $id
     * @param  \Illuminate\Database\Eloquent\Model  $model
     *
     * @return void
     */
    public function up($id, Model $model)
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('address');
            $table->string('website')->unique();
            $table->string('email')->unique();
            $table->string('account')->unique();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @param  string|int  $id
     * @param  \Illuminate\Database\Eloquent\Model  $model
     *
     * @return void
     */
    public function down($id, Model $model)
    {
        Schema::drop('stores');
    }
}
