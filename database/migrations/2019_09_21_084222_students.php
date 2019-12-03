<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('father_name');
            $table->string('last_name');
            $table->string('grand_father_name');
            $table->string('school');
            $table->string('year');
            $table->string('kankor_score');
            $table->string('faculty');
            $table->string('province');
            $table->string('gender');
            $table->integer('status')->default(0);
            // this is for dropedout students definition
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
        Schema::dropIfExists('students');
    }
}
