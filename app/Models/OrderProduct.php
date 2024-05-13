<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'item_status', 'item_result', 'item_rawdata', 'price'];


    // relate to product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getCreatedAtDateAttribute($value)
    {
        return $value->format('Y-m-d');
    }
}
