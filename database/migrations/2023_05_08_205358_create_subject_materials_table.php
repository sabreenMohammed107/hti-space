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
        Schema::create('subject_materials', function (Blueprint $table) {
            $table->id();
            $table->string('file_path', 250)->nullable();
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->date('upload_date')->nullable();
            $table->string('file_type_id', 250)->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_materials');
    }
};
