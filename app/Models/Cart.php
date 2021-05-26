<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';


    protected $fillable = [
        'user_id',
        'product_code',
        'quantity',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_code', 'product_code');
    }

    public function getTotalPrice() {
          return $this->quantity * $this->product->product_price->price;
    }
}
