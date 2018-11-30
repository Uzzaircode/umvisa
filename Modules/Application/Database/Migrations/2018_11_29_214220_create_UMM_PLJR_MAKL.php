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
        Schema::create('', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();
        });
    }

//     SIS_INT	NUMBER(11)
// SIS_NODAFTAR	VARCHAR2(12)
// SIS_NOMKPB	VARCHAR2(12)
// SIS_USERNAME	VARCHAR2(30)
// SIS_KATALALUAN	VARCHAR2(50)
// SIS_NAMA	VARCHAR2(80)
// SIS_KOD_IJAZAH	VARCHAR2(5)
// SIS_KOD_MAJOR	VARCHAR2(3)
// SIS_USER_UID	VARCHAR2(11)
// SIS_EMEL	VARCHAR2(50)
// SIS_HP	VARCHAR2(10)


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
