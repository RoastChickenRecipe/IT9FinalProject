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
        Schema::create('rq_documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_type');
            $table->string('issue_date');
            //$table->foreignId('citizen_id')->constrained('citizens', 'id')->onUpdate('cascade');
            $table->unsignedBigInteger('citizen_id')->nullable();
            $table->foreign('citizen_id')->references('id')->on('citizens')->onUpdate('cascade')->nullOnDelete();
            //$table->foreignId('employee_id')->constrained('employees', 'id')->onUpdate('cascade');
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
        Schema::dropIfExists('rq_documents');
    }
};
