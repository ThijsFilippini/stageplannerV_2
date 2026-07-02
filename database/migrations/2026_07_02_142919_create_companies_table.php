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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('kvk_number')->unique();
            $table->string('image_path')->nullable();
            $table->string('adress');
            $table->string('city');
            $table->string('zip');
            $table->integer('phone_number');
            $table->integer('available');
            $table->enum('status', ['geverifieerd', 'ter_beoordeling', 'afgekeurd'])->default('ter_beoordeling');
            $table->foreignId('sector_id')->constrained('sectors')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
