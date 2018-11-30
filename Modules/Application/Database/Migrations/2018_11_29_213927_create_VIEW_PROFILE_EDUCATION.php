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
        Schema::create('', function (Blueprint $table) {
            $table->increments('id');
            
            $table->timestamps();
        });
    }

// MBUT_NOMKPB	VARCHAR2(12)
// MBUT_NOMKP	VARCHAR2(12)
// MBUT_NAMA	VARCHAR2(100)
// MBUT_ALAMAT1	VARCHAR2(50)
// MBUT_ALAMAT2	VARCHAR2(50)
// MBUT_POSKOD	VARCHAR2(20)
// MBUT_BANDAR	VARCHAR2(20)
// MBUT_NEGERI	VARCHAR2(2)
// MBUT_TELEFON	VARCHAR2(15)
// MBUT_TEL_BIMBIT	VARCHAR2(12)
// MBUT_WARGA	VARCHAR2(3)
// MBUT_ASAL	VARCHAR2(50)
// MBUT_JANTINA	VARCHAR2(1)
// MBUT_TRKHLAHIR	DATE
// MBUT_MASTAUTIN	VARCHAR2(2)
// PBP_NODAFTAR	VARCHAR2(9)
// PBP_NOMKPB	VARCHAR2(12)
// PBP_KOD_IJAZAH	VARCHAR2(5)
// PBP_JENIS_PENGAJIAN	VARCHAR2(10)
// PBP_PROGRAM	VARCHAR2(2)
// MP_TRKH_DAFTAR	DATE
// SIS_USERNAME	VARCHAR2(30)
// SIS_KATALALUAN	VARCHAR2(50)
// JAB_HRIS	VARCHAR2(5)
// FKLTI_KOD_SIS	VARCHAR2(2)
// FKLTI_KOD_HRIS	VARCHAR2(4)
// FKLTI_KTRGN	VARCHAR2(90)
// PBP_STATUS_PEMOHON	VARCHAR2(5)
// MBUT_ASRAMA	VARCHAR2(2)
// MBUT_KTRGN_ASRAMA	VARCHAR2(45)
// STATUS_AKTIF	VARCHAR2(1)
// KPNG_TARIKH_SENAT	DATE


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
