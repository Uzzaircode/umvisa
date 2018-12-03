<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAKLUMATSTAFSISVW extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MAKLUMAT_STAF_SIS_VW', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NO_STAF')->nullable();
            $table->string('KOD_GELARAN')->nullable();
            $table->string('EMP_GELARAN')->nullable();
            $table->string('EMP_NAME')->nullable();
            $table->string('EMP_IC_NEW')->nullable();
            $table->string('EMP_IC_OLD')->nullable();
            $table->string('PASSPORT_NO')->nullable();
            $table->string('EMPLOYMENT_STATUS')->nullable();
            $table->date('APPOINTMENT_DATE')->nullable();
            $table->date('EMP_EMPLOYMENT_END_DATE')->nullable();
            $table->string('GRADE_DESCRIPTION')->nullable();
            $table->string('POSITION_CODE')->nullable();
            $table->string('POSITION_DESC')->nullable();
            $table->string('UNIT_CODE')->nullable();
            $table->string('SECTION_CODE')->nullable();
            $table->string('DEPARTMENT_CODE')->nullable();
            $table->string('PTJ_CODE')->nullable();
            $table->string('EMP_PHONE_NO2')->nullable();
            $table->string('EMP_ADDRESS_CURR_1')->nullable();
            $table->string('EMP_ADDRESS_CURR_2')->nullable();
            $table->string('EMP_ADDRESS_CURR_3')->nullable();
            $table->string('EMP_POSTCODE_CURR')->nullable();
            $table->string('BIO_NEGERI_SEMASA')->nullable();
            $table->string('EMP_EMAIL_ADD')->nullable();
            $table->string('EMP_EMAIL_ALT')->nullable();
            $table->string('BIO_AGAMA')->nullable();
            $table->string('BIO_STATUS_STAF')->nullable();
            $table->string('KTRGN_STATUS_STAF')->nullable();
            $table->string('RKH_TARAF_KHIDMAT')->nullable();
            $table->string('JANTINA')->nullable();
            $table->string('STATUS_KAHWIN')->nullable();
            $table->string('NEGARA_ASAL')->nullable();
            $table->string('WARGANEGARA')->nullable();
            $table->string('TEL_PEJ')->nullable();
            $table->string('FAX_PEJ')->nullable();
            $table->string('JENIS_JAWATAN')->nullable();
            $table->string('UNIT_DESC')->nullable();
            $table->string('JABATAN_DESC')->nullable();
            $table->string('PTJ_DESC')->nullable();
            $table->date('TKH_LAHIR')->nullable();
            $table->string('TEL_HP')->nullable();
            $table->string('STAFUM')->nullable();
            $table->string('KECACATAN')->nullable();
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
        Schema::dropIfExists('MAKLUMAT_STAF_SIS_VW');
    }
}
