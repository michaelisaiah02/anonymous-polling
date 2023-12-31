<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->char('id_poll', 5)->unique();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->string('statement');
            $table->dateTime('waktu_mulai')->default(now());
            $table->dateTime('waktu_selesai')->default(now()->addMinute());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polls');
    }
};
