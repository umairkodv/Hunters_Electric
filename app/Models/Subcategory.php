<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    /**
     * The image to actually display for this subcategory: the real
     * uploaded/pasted image if one is set, otherwise a shared fallback
     * placeholder. Views should use this for <img src="...">, and use
     * featured_image_url directly only when editing the raw stored value.
     */
    protected function displayImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->featured_image_url ?: asset('images/category-placeholder.svg'),
        );
    }
}
