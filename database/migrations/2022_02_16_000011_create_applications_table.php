<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('form_no');
            $table->integer('discount');
            $table->integer('total_after_discount')->nullable();
            $table->longText('comments')->nullable();
            $table->string('payment_type');
            $table->integer('no_of_installments');
            $table->string('installments_period')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
