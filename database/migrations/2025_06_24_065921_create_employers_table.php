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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('company_website')->nullable();
            $table->string('logo')->nullable();
            $table->text('company_address')->nullable();
            $table->text('company_description')->nullable();
            $table->string('industry_type')->nullable(); // eg. IT, Education, Garments
            $table->boolean('is_approved')->default(false);
            $table->boolean('status')->default(true); // Active/Inactive
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
