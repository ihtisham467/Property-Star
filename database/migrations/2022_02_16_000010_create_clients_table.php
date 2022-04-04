<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clientid')->nullable();
            $table->string('membership_no');
            $table->date('date_of_membership');
            $table->string('name');
            $table->string('cnic_nicop_no');
            $table->string('passport_no')->nullable();
            $table->string('father_name')->nullable();
            $table->string('profession')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_profession')->nullable();
            $table->string('education')->nullable();
            $table->string('nationality');
            $table->string('religion');
            $table->string('resident_villa_no')->nullable();
            $table->string('street_no')->nullable();
            $table->string('sector')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('marital_status');
            $table->string('present_address')->nullable();
            $table->string('office_contact')->nullable();
            $table->string('home_contact')->nullable();
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('permanent_address');
            $table->string('domicile')->nullable();
            $table->string('next_of_kin');
            $table->string('relation_kin');
            $table->string('cnic_ni_cop_kin_no');
            $table->string('passport_no_kin')->nullable();
            $table->string('referred_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
