<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'subcategory_id', 'part_number', 'image_url', 'type_description', 
        'specifications', 'warehouse_status', 'stock_qty', 'price'
    ];

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function quotationItems() {
        return $this->hasMany(QuotationItem::class);
    }
}
