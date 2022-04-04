<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('application_id')->nullable();
            $table->foreign('application_id', 'application_fk_5916887')->references('id')->on('applications');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_5916905')->references('id')->on('users');
            $table->unsignedBigInteger('installment_id')->nullable();
            $table->foreign('installment_id', 'installment_fk_5917150')->references('id')->on('installments');
        });
    }
}
