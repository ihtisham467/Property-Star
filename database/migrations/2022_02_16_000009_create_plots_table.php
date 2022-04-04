<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotsTable extends Migration
{
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plotid')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('area')->nullable();
            $table->string('sector')->nullable();
            $table->string('block')->nullable();
            $table->string('plot_type');
            $table->string('plot_type_other')->nullable();
            $table->string('size');
            $table->boolean('boulevard')->default(0)->nullable();
            $table->boolean('main_road')->default(0)->nullable();
            $table->boolean('facing_park')->default(0)->nullable();
            $table->boolean('corner')->default(0)->nullable();
            $table->boolean('twoor_more_sides_open')->default(0)->nullable();
            $table->string('prefred_choice')->nullable();
            $table->integer('price_per_marla');
            $table->integer('total_price')->nullable();
            $table->integer('land_charges')->nullable();
            $table->integer('development_charges')->nullable();
            $table->longText('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
