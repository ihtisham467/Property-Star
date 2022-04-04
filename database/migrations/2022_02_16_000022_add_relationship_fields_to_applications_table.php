<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_5916531')->references('id')->on('clients');
            $table->unsignedBigInteger('plot_id')->nullable();
            $table->foreign('plot_id', 'plot_fk_5916532')->references('id')->on('plots');
            $table->unsignedBigInteger('dealer_id')->nullable();
            $table->foreign('dealer_id', 'dealer_fk_5916533')->references('id')->on('dealers');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id', 'agent_fk_5916534')->references('id')->on('users');
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->foreign('manager_id', 'manager_fk_5916535')->references('id')->on('users');
        });
    }
}
