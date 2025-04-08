<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    // Has many products
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
