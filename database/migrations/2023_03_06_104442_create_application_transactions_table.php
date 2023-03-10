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
        Schema::create('application_transactions', function (Blueprint $table) {
            $table->increments('application_transaction_id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('studentinfo');
            $table->text('school_name');
            $table->text('year_level');
            $table->text('application_status');
            $table->integer('applicationPeriod_id')->unsigned();
            $table->foreign('applicationPeriod_id')->references('applicationPeriod_id')->on('application_periods');
            $table->integer('scholarship_id')->unsigned();
            $table->foreign('scholarship_id')->references('scholarship_id')->on('scholarshipinfo');
            $table->text('enrollment_form')->default('null.pdf');
            $table->text('grades_copy')->default('null.pdf');
            $table->text('junior_record')->default('null.pdf');
            $table->text('senior_record')->default('null.pdf');
            $table->text('validID')->default('null.pdf');
            $table->text('form_137')->default('null.pdf');
            $table->text('cert_honors')->default('null.pdf');
            $table->text('voterscert_parent')->default('null.pdf');
            $table->text('votercert_applicant')->default('null.pdf');
            $table->text('birthcert')->default('null.pdf');
            $table->text('status')->default('processing');
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
        Schema::dropIfExists('application_transactions');
    }
};
