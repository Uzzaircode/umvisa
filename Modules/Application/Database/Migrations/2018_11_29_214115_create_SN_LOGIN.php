<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSNLOGIN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SN_LOGIN', function (Blueprint $table) {
            $table->increments('id');
            $table->string('STA_NOSTAF')->nullable();
            $table->string('STA_ID_PENGGUNA')->nullable();
            $table->string('STA_KATA_LALUAN')->nullable();
            $table->string('STA_AKTIF')->nullable();            
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
        Schema::dropIfExists('SN_LOGIN');
    }
}
