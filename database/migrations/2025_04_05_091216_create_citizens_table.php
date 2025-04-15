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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 50);
            $table->string('mname', 50);
            $table->string('lname', 50);
            $table->string('suffix', 10)->nullable();

            $table->string('sex', 20);
            $table->string('age', 5);
            $table->string('family_role', 20);
            $table->date('birth_date');
            $table->string('place_of_birth', 100);
            $table->string('blood_type', 20);
            $table->string('religion', 50);

            $table->string('contactNum', 15);
            $table->string('years_of_residency', 10);
            $table->string('educational_attainment', 100);
            $table->string('citizen_status', 50)->nullable();
            $table->string('employment_status', 50);
            $table->decimal('income', total:10, places:2)->nullable();

            $table->unsignedBigInteger('household_id');
            $table->foreign('household_id')->references('id')->on('households')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('household_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizens');
    }
};
