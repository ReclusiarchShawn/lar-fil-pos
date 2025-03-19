<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'barcode', 'description', 'price', 'category_id'];

    // A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A product has one stock record
    public function stock()
    {
        return $this->belongsToMany(Stock::class, 'stock_product')->withPivot('stock_price')->withTimestamps();
    }

    // A product can appear in many sale items
    public function saleItems()
    {
        return $this->hasMany(sale_item::class);
    }
}
