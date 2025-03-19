<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'total_price', 'payment_status'];

    // A sale belongs to a customer
    public function customer()
    {
        return $this->belongsTo(customer::class)->withDefault();
    }

    // A sale has many sale items
    public function saleItems()
    {
        return $this->hasMany(sale_item::class);
    }
}
