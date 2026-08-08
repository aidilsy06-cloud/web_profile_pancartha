<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tech_stack'); // comma separated e.g. "Laravel, MySQL, CSS"
            $table->text('problem');
            $table->text('solution');
            $table->text('result');
            $table->string('demo_url')->nullable();
            $table->string('repo_url')->nullable();
            $table->string('image')->nullable(); // path to uploaded image
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
