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
            $table->unsignedBigInteger('complainant_id');
            $table->foreign('complainant_id')->references('id')->on('complainants')->onUpdate('cascade')->onDelete('cascade');
            $table->string('incident_type', 50);
            $table->longText('description')->nullable();
            $table->date('date_reported');
            $table->string('status', 20);
            //$table->foreignId('employee_id')->constrained('employees', 'id')->onUpdate('cascade');
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
