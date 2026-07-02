<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Department extends Model
{
    protected $fillable = ['name', 'slug', 'sort_order'];

    protected static function booted() {
        static::creating(fn ($m) => $m->slug = Str::slug($m->name));
    }

    // A department has many card grouping blocks
    public function mainCategories() {
        return $this->hasMany(MainCategory::class)->orderBy('sort_order');
    }
}
