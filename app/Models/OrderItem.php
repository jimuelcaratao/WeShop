<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $primaryKey = 'order_item_id';

    protected $fillable = [
        'order_no',
        'product_code',
        'quantity',
        'price',
    ];
    
    public function product()
    {
        return $this->hasOne(Product::class, 'product_code', 'product_code');
    }

}
