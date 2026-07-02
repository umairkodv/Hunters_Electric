<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. DEPARTMENTS TABLE (e.g., Alternators, Starters, Components, Accessories)
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 2. MAIN CATEGORIES TABLE (The card headers / groups inside a department)
        Schema::create('main_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->unique(['department_id', 'slug']);
        });

        // 3. SUBCATEGORIES TABLE (The link items inside a card group)
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['main_category_id', 'slug']);
        });

        // 4. PRODUCT DETAILS TABLE (Granular part tracking for upcoming catalog screens)
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
            $table->string('part_number')->unique();
            $table->string('type_description');
            $table->text('specifications');
            $table->string('warehouse_status')->default('In Stock'); // In Stock, Low Stock, Out of Stock
            $table->integer('stock_qty')->default(0);
            $table->decimal('price', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('main_categories');
        Schema::dropIfExists('departments');
    }
};
