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
        Schema::create('logbooks', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('total_hours');
            $table->text('remark');
            $table->text('reflection');
            $table->enum('status', ['goedgekeurd', 'afgekeurd', 'in_behandeling'])->default('in_behandeling');
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('internship_id')->constrained('internships')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbooks');
    }
};
