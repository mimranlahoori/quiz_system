<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('cate_name')->index('cate_name')->nullable();
            $table->unsignedBigInteger('cate_parent_id')->nullable(); // Parent category (null if root category)
            $table->string('cate_link')->nullable();
            $table->timestamps();

            // Foreign key constraint to reference itself for parent-child relationships
            $table->foreign('cate_parent_id')->references('id')->on('categories')->onDelete('SET NULL');
        });

        Schema::create('quiz_category_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('quiz_category_pivot');
    }
};
