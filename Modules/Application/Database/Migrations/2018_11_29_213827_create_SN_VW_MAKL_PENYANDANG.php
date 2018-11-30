<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSNVWMAKLPENYANDANG extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SN_VW_MAKL_PENYANDANG', function (Blueprint $table) {
            $table->increments('id');
            $table->string('GLR_KTRGN_GELARAN_BM')->nullable();
            $table->string('BIO_NOSTAF')->nullable();
            $table->string('BIO_NAMA')->nullable();
            $table->string('JWT_KTRGN_JAWATAN')->nullable();
            $table->string('JWT_KOD_JAWATAN')->nullable();
            $table->string('UNT_KTRGN_UNIT')->nullable();
            $table->string('UNT_KOD_UNIT')->nullable();
            $table->string('JBT_KTRGN_JABATAN')->nullable();
            $table->string('JBT_KOD_JABATAN')->nullable();
            $table->string('PTG_KTRGN_PTJ')->nullable();
            $table->string('PTG_KOD_PTJ')->nullable();
            $table->date('RKH_TKH_LANTIK_SEMASA')->nullable();
            $table->date('RKH_TKH_AKHIR_KHIDMAT')->nullable();
            $table->string('BIO_USERID_UMMAIL')->nullable();
            $table->string('SKS_KOD_SEKSYEN')->nullable();
            $table->string('SKS_KTRGN_SEKSYEN')->nullable();
            $table->string('PERINGKAT_SANDANG')->nullable();
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
        Schema::dropIfExists('');
    }
}
