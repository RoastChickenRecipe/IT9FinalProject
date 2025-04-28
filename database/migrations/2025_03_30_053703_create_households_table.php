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
        Schema::create('households', function (Blueprint $table) {
            $table->id();
            $table->string('household_type', 100);
            //$table->string('family_income');

            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade')->nullOnDelete();

            $table->unsignedBigInteger('barangay_id')->nullable();
            $table->foreign('barangay_id')->references('id')->on('barangays')->onUpdate('cascade')->nullOnDelete();

            $table->unsignedBigInteger('subdivision_id')->nullable();
            $table->foreign('subdivision_id')->references('id')->on('subdivisions')->onUpdate('cascade')->nullOnDelete();
            
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->nullOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('households');
    }
};
