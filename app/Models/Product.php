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


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'product_code',
        'category_name',
        'sub_category_name',
        'brand_id',
        'product_name',
        'description',
        'specs',
        'stock',
        'price',
    ];

    public function product_photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'brand_id', 'brand_id');
    }
}
