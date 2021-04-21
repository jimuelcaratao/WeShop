<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'product_code';

    public function product_photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'brand_id', 'brand_id');
    }
}
