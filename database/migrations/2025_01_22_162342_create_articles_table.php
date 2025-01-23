<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/* Assignment 3B */
// 7.

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 9.
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('body');
            $table->foreignId('author_id');
            $table->foreignId('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
