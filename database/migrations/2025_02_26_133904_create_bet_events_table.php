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
        Schema::create('bet_events', function (Blueprint $table) {
            $table->id();
            $table->integer('betId');
            $table->string('name', 255);
            $table->text('description');
            $table->timestamp('eventDate');
            $table->string('status');
            $table->foreignId('bet_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bet_events');
    }
};
