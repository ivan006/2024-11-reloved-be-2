<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable(); // Nullable image attribute
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete(); // Links to brands table
            $table->foreignId('gender_id')->constrained()->cascadeOnDelete(); // Links to genders table
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); // Links to categories table
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
