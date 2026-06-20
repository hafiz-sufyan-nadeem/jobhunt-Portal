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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('employers');
            $table->foreignId('category_id')->constrained('job_categories');
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['full-time', 'part-time', 'remote']);
            $table->text('city');
            $table->string('salary_range');
            $table->enum('status', ['active', 'closed'])->default('active');
            $table->date('deadline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
