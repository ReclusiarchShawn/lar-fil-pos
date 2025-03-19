<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];

    // A category has many products
    public function products()
    {
        return $this->hasMany(product::class);
    }
}
