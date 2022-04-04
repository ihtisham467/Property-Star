<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('challan_no');
            $table->string('payment_mode');
            $table->date('date');
            $table->integer('amount');
            $table->string('payment_type');
            $table->string('payment_medium');
            $table->string('bank_name')->nullable();
            $table->string('bank_slip_no')->nullable();
            $table->date('bank_payment_date')->nullable();
            $table->string('account_no_from')->nullable();
            $table->string('bank_name_to')->nullable();
            $table->string('account_no_to')->nullable();
            $table->string('depositor_name');
            $table->string('depositor_cnic');
            $table->string('depositor_contact');
            $table->string('cachier_name');
            $table->string('cashier_cnic')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('cheque_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
