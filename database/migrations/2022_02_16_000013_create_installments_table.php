<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('due_date');
            $table->integer('amount');
            $table->longText('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
