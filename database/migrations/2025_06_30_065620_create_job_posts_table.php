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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('job_code')->unique()->nullable(); // internal tracking
            $table->string('job_title');
            $table->string('slug')->unique();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable(); // image URL/path
            $table->string('job_type'); // full-time, part-time
            $table->string('category');
            $table->string('job_level')->nullable(); // Entry/Mid/Senior
            $table->integer('vacancy')->nullable();
            $table->string('location')->nullable();
            $table->boolean('remote_available')->default(false);
            $table->string('salary_range')->nullable();
            $table->boolean('salary_hidden')->default(false);
            $table->date('deadline')->nullable()->index();
            $table->time('application_deadline_time')->index()->nullable();
            $table->text('description')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('requirements')->nullable();
            $table->text('education_requirements')->nullable();
            $table->text('experience_requirements')->nullable();
            $table->string('gender')->nullable(); // Male/Female/Any
            $table->string('age_limit')->nullable();
            $table->string('skills')->nullable(); // comma-separated
            $table->text('job_benefits')->nullable();
            $table->string('application_email')->nullable();
            $table->string('application_link')->nullable();
            $table->text('apply_instruction')->nullable();
            $table->string('job_language')->default('en'); // for multi-lang
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->boolean('status')->default(true); // published/draft
            $table->string('tags')->nullable(); // SEO or filtering
            $table->unsignedInteger('view_count')->default(0); // tracking views
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
