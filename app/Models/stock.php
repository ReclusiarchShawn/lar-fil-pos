<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;

    protected $fillable = ['barcode', 'product_id', 'quantity'];

    // A stock entry belongs to a product
    public function product()
    {
        return $this->belongsToMany(product::class, 'stock_product')->withPivot('stock_price')->withTimestamps();
    }
}
