<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complainants', function (Blueprint $table) {
            $table->id();
            $table->string('com_fname', 50);
            $table->string('com_lname', 50);
            $table->string('com_contactNum', 50);
            $table->string('def_name', 100);
            $table->string('def_conNum', 15)->nullable();
            $table->string('def_address')->nullable();
            $table->date('date_reported');

            $table->unsignedBigInteger('com_mun_id');
            $table->foreign('com_mun_id')->references('id')->on('municipalities')->onUpdate('cascade');
            $table->unsignedBigInteger('com_brgy_id');
            $table->foreign('com_brgy_id')->references('id')->on('barangays')->onUpdate('cascade');
            $table->unsignedBigInteger('com_subd_id');
            $table->foreign('com_subd_id')->references('id')->on('subdivisions')->onUpdate('cascade');

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complainants');
    }
};
