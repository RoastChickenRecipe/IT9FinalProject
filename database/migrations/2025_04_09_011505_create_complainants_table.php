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
            $table->string('com_address');
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
