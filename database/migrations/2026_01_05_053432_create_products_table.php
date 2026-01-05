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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title', 150);
            $table->text('description');
            $table->decimal('price', 10,2);
            $table->enum('condition',['new', 'like_new', 'used']);
            $table->enum('size', ['S', 'M', 'L', 'XL', 'XLL', 'XXL']);
            $table->string('brand', 100)->nullable();
            $table->unsignedInteger('stock');
            $table->enum('status', ['draft', 'active', 'sold']);
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
