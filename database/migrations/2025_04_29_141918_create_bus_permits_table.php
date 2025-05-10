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
        Schema::create('bus_permits', function (Blueprint $table) {
            $table->id();
            $table->string('b_fname', 100);
            $table->string('b_mname', 50);
            $table->string('b_lname', 50);
            $table->string('b_contactNum', 15);
            $table->string('b_age', 3);
            $table->date('b_birthDate');

            $table->string('bus_structure');
            $table->string('dti_cda_cert');
            $table->string('bus_mayor_permit');
            $table->string('brgy_clearance');
            $table->string('comm_tax_cert');
            $table->string('k_of_lease');
            $table->string('zoning_clearance');

            $table->string('sanitary_permit')->nullable();
            $table->string('fire_safety_permit')->nullable();
            $table->string('bfad_permit')->nullable();

            $table->unsignedBigInteger('mun_id');
            $table->foreign('mun_id')->references('id')->on('municipalities')->onUpdate('cascade');
            $table->unsignedBigInteger('brgy_id');
            $table->foreign('brgy_id')->references('id')->on('barangays')->onUpdate('cascade');
            $table->unsignedBigInteger('subd_id');
            $table->foreign('subd_id')->references('id')->on('subdivisions')->onUpdate('cascade');

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
        Schema::dropIfExists('bus_permits');
    }
};
