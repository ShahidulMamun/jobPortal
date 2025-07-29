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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('job_posts')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // job seeker
            $table->text('cover_letter')->nullable();
            $table->string('cv_path')->nullable(); // uploaded CV (PDF/Doc)
            $table->timestamp('applied_at')->useCurrent();
            $table->enum('status', ['pending', 'reviewed', 'shortlisted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
