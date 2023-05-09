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
        Schema::create('subject_assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250)->nullable();
            $table->string('assignment', 250)->nullable();
            $table->string('image', 250)->nullable();
            $table->string('file_attach', 250)->nullable();
            $table->date('assignment_date')->nullable();
            $table->date('deadline_date')->nullable();
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_assignments');
    }
};
