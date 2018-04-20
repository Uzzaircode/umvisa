<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path')->nullable();
            $table->integer('ticket_id')->unsigned()->nullable();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_attachments');
    }
}
