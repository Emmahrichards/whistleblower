<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // Category: 1 = general, 2 = integrity
            $table->unsignedTinyInteger('category')->comment('1 = general, 2 = integrity');

            // Comment text
            $table->text('comment');

            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down(): void
    {
        // Drop the comments table if it exists
        Schema::dropIfExists('comments');
    }
};
