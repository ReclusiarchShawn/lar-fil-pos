<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock_product extends Model
{
    use HasFactory;

    protected $table = 'stock_product'; // Specify the table name

    protected $fillable = ['stock_id', 'product_id', 'stock_price'];

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship with Stock
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
