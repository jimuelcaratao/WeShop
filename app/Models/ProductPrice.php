<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $table = 'product_prices';
    protected $primaryKey = 'product_price_id';

    protected $fillable = [
        'product_code',
        'price',
        'discount_type',
        'discount_price',
        'discounted_price',
        'discount_start',
        'discount_end',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
