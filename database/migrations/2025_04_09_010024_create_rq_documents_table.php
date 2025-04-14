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
            $table->foreignId('citizen_id')->constrained('citizens', 'id')->onUpdate('cascade');
            $table->foreignId('employee_id')->constrained('employees', 'id')->onUpdate('cascade');
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
