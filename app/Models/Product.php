<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_code';

    public function product_photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
