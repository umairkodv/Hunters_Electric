<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subcategories', function (Blueprint $table) {
            // Adds a boolean flag to isolate featured home items easily
            $table->boolean('is_featured')->default(false)->after('slug');
            // Stores the custom high-fidelity image path strings
            $table->string('featured_image_url')->nullable()->after('is_featured');
            
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropColumn(['is_featured', 'featured_image_url']);
        });
    }
};
