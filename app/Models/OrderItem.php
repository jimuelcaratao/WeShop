<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'order_items';
    protected $primaryKey = 'order_item_id';

    
    public function product()
    {
        return $this->hasOne(Product::class, 'product_code', 'product_code');
    }

}
