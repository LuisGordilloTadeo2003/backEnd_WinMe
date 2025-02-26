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
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->integer('groupId');
            $table->integer('creatorId');
            $table->integer('categoryId');
            $table->string('name', 255);
            $table->text('description');
            $table->integer('totalAmount');
            $table->timestamp('startDate');
            $table->timestamp('endDate');
            $table->string('status');
            $table->foreignId('group_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bets');
    }
};
