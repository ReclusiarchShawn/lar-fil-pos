<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale_item extends Model
{
    use HasFactory;

    protected $fillable = ['sale_id', 'product_id', 'quantity', 'price'];

    // A sale item belongs to a sale
    public function sale()
    {
        return $this->belongsTo(sale::class);
    }

    // A sale item belongs to a product
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
