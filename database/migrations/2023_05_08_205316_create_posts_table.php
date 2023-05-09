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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('image', 250)->nullable();
            $table->string('title', 250)->nullable();
            $table->longText('text')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->date('post_date')->nullable();
            $table->unsignedBigInteger('post_type_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
