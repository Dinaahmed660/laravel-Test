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
        Schema::create('_places', function (Blueprint $table) {
            $table->id();
            $table->string('Title', 100);
            $table->text('description');
            $table->decimal('from', 5, 2);
            $table->decimal('to', 5, 2);
            $table->string('image', 100);
            $table->boolean('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_places');
    }
};
