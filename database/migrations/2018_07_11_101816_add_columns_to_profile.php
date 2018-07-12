<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('matric_num')->nullable();
            $table->string('study_mode')->nullable();
            $table->string('ic_num')->nullable();
            $table->string('passport_num')->nullable();
            $table->string('citizenship');
            $table->string('department')->nullable();
            $table->string('faculty')->nullable();
            $table->string('office_num');
            $table->string('mobile_num')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
