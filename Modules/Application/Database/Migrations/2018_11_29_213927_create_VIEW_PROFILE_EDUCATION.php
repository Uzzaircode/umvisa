<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVIEWPROFILEEDUCATION extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VIEW_PROFILE_EDUCATION', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MBUT_NOMKPB')->nullable();
            $table->string('MBUT_NOMKP')->nullable();
            $table->string('MBUT_NAMA')->nullable();
            $table->string('MBUT_ALAMAT1')->nullable();
            $table->string('MBUT_ALAMAT2')->nullable();
            $table->string('MBUT_POSKOD')->nullable();
            $table->string('MBUT_BANDAR')->nullable();
            $table->string('MBUT_NEGERI')->nullable();
            $table->string('MBUT_TELEFON')->nullable();
            $table->string('MBUT_TEL_BIMBIT')->nullable();
            $table->string('MBUT_WARGA')->nullable();
            $table->string('MBUT_ASAL')->nullable();
            $table->string('MBUT_JANTINA')->nullable();
            $table->date('MBUT_TRKHLAHIR')->nullable();
            $table->string('MBUT_MASTATUTIN')->nullable();
            $table->string('PBP_NODAFTAR')->nullable();
            $table->string('PBP_NOMKPB')->nullable();
            $table->string('PBP_KOD_IJAZAH')->nullable();
            $table->string('PBP_JENIS_PENGAJIAN')->nullable();
            $table->string('PBP_PROGRAM')->nullable();
            $table->date('MP_TRKH_DAFTAR')->nullable();
            $table->string('SIS_USERNAME')->nullable();
            $table->string('SIS_KATALALUAN')->nullable();
            $table->string('JAB_HRIS')->nullable();
            $table->string('FKLTI_KOD_SIS')->nullable();
            $table->string('FKLTI_KOD_HRIS')->nullable();
            $table->string('FKLTI_KTRGN')->nullable();
            $table->string('PBP_STATUS_PEMOHON')->nullable();
            $table->string('MBUT_ASRAMA')->nullable();
            $table->string('MBUT_KTRGN_ASRAMA')->nullable();
            $table->string('STATUS_AKTIF')->nullable();
            $table->date('KPNG_TARIKH_SENAT')->nullable();
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
