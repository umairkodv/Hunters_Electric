<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    protected $fillable = [
        'main_category_id', 
        'name', 
        'slug', 
        'is_featured', 
        'featured_image_url', 
        'sort_order'
    ];

    protected static function booted() {
        static::creating(fn ($m) => $m->slug = Str::slug($m->name));
    }

    public function mainCategory() {
        return $this->belongsTo(MainCategory::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
