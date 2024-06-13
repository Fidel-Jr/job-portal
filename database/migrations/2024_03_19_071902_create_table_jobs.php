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
        Schema::create('table_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_region');
            $table->string('job_type');
            $table->string('vacancy');
            $table->string('experience');
            $table->string('salary');
            $table->string('application_deadline');
            $table->string('job_description');
            $table->string('responsibilities');
            $table->string('education_experiment');
            $table->string('image');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_jobs');
    }
};
