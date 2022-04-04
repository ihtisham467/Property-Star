<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id', 'country_fk_5888455')->references('id')->on('countries');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id', 'province_fk_5888456')->references('id')->on('provinces');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id', 'city_fk_5888457')->references('id')->on('cities');
        });
    }
}
