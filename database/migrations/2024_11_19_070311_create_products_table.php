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
            // Attributes
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable(); // Nullable image attribute
            $table->date('purchase_date'); // Date the product was purchased
            $table->timestamps();

            // Constraints
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('gender_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('seller_id'); // Links to users table for the seller
            $table->unsignedInteger('buyer_id'); // Links to users table for the buyer

            // Foreign key constraints
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
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
