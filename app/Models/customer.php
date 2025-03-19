<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'phone', 'email', 'address'];

    // A customer has many sales
    public function sales()
    {
        return $this->hasMany(sale::class);
    }
}
