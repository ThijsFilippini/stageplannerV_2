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
        Schema::create('meeting_participants', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['onbekend', 'geaccepteerd', 'afgewezen']);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('meeting_id')->constrained('meetings')->cascadeOnDelete();
            $table->timestamp('responted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_participants');
    }
};
