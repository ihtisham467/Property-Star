<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealersTable extends Migration
{
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father_name');
            $table->string('phone');
            $table->string('cnic');
            $table->date('dob')->nullable();
            $table->date('doj');
            $table->string('gender');
            $table->string('referred_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
