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
    // STA_NOSTAF	VARCHAR2(15)
    // STA_ID_PENGGUNA	VARCHAR2(20)
    // STA_KATA_LALUAN	VARCHAR2(50)
    // STA_AKTIF	VARCHAR2(1)
    // STA_CREATED_BY	VARCHAR2(20)
    // STA_CREATED_DATE	DATE
    // STA_UPDATED_BY	VARCHAR2(20)
    // STA_UPDATED_DATE	DATE
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('');
    }
}
