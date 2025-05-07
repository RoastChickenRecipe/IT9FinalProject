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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('incident_type', 50);
            $table->longText('description')->nullable();
            $table->string('inc_address', 150);
            $table->longText('dates_time');
            $table->longText('involved')->nullable();
            $table->longText('action_taken')->nullable();
            $table->date('date_reported');

            $table->unsignedBigInteger('mun_id');
            $table->foreign('mun_id')->references('id')->on('municipalities')->onUpdate('cascade');
            $table->unsignedBigInteger('brgy_id');
            $table->foreign('brgy_id')->references('id')->on('barangays')->onUpdate('cascade');
            
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
        Schema::dropIfExists('incidents');
    }
};
