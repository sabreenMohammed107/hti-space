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
        //
        Schema::table('professors', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('stage_id')->references('id')->on('stages');

        });


         Schema::table('professor_subjects', function (Blueprint $table) {
            $table->foreign('professor_id')->references('id')->on('professors');
            $table->foreign('subject_id')->references('id')->on('subjects');

        });


        Schema::table('student_subjects', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('subject_id')->references('id')->on('subjects');

        });


        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('post_type_id')->references('id')->on('post_types');

        });


        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('post_id')->references('id')->on('posts');

        });


        Schema::table('subject_materials', function (Blueprint $table) {
            $table->foreign('professor_id')->references('id')->on('professors');
            $table->foreign('subject_id')->references('id')->on('subjects');

        });


        Schema::table('subject_assignments', function (Blueprint $table) {
            $table->foreign('professor_id')->references('id')->on('professors');
            $table->foreign('subject_id')->references('id')->on('subjects');

        });

        Schema::table('assignment_solutions', function (Blueprint $table) {
            $table->foreign('assignment_id')->references('id')->on('subject_assignments');
            $table->foreign('student_id')->references('id')->on('students');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
