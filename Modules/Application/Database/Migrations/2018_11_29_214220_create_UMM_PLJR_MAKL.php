<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUMMPLJRMAKL extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UMM_PLJR_MAKL', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('SIS_INT')->nullable();
            $table->string('SIS_NOMKPB')->nullable();
            $table->string('SIS_USERNAME')->nullable();
            $table->string('SIS_KATALALUAN')->nullable();
            $table->string('SIS_NAMA')->nullable();
            $table->string('SIS_KOD_IJAZAH')->nullable();
            $table->string('SIS_KOD_MAJOR')->nullable();
            $table->string('SIS_USER_UID')->nullable();
            $table->string('SIS_EMEL')->nullable();
            $table->string('SIS_HP')->nullable();
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
        Schema::dropIfExists('UMM_PLJR_MAKL');
    }
}
