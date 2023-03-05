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
        Schema::create('application_periods', function (Blueprint $table) {
            $table->increments('applicationPeriod_id');
            $table->integer('acadyears_id')->unsigned();
            $table->foreign('acadyears_id')->references('acadyears_id')->on('academic_years');
            $table->text('semester');
            $table->date('start_application');
            $table->date('end_application');
            $table->date('scholarship_expiration');
           
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
        Schema::dropIfExists('application_periods');
    }
};
