<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MainCategory extends Model
{
    protected $fillable = ['department_id', 'name', 'slug', 'sort_order'];

    protected static function booted() {
        static::creating(fn ($m) => $m->slug = Str::slug($m->name));
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    // A main card category has many child list links
    public function subcategories() {
        return $this->hasMany(Subcategory::class)->orderBy('sort_order');
    }
}
