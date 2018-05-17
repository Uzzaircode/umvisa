<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatesToTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dateTime('approved_hod_date')->nullable();
            $table->dateTime('rejected_hod_date')->nullable();
            $table->dateTime('approved_dasar_date')->nullable();
            $table->dateTime('rejected_dasar_date')->nullable();
            $table->dateTime('approved_ptm_date')->nullable();
            $table->dateTime('rejected_ptm_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('', function (Blueprint $table) {

        });
    }
}