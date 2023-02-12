<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentinfo', function (Blueprint $table) {
            $table->increments('student_id');
            $table->text('lname');
            $table->text('fname');
            $table->text('midname');
            $table->text('addressline');
            $table->text('barangay');
            $table->integer('age');
            $table->text('gender');
            $table->text('phone');
            $table->text('religion');
            $table->date('date_of_birth');
            $table->text('place_of_birth');
            $table->text('father_name');
            $table->text('mother_name');
            $table->text('img_path');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentinfo');
    }
};
