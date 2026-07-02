<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'subcategory_id', 'part_number', 'type_description', 
        'specifications', 'warehouse_status', 'stock_qty', 'price'
    ];

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }
}
