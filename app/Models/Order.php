<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'orders';
    protected $primaryKey = 'order_no';

    protected $fillable = [
        'user_id',
        'status',
        'packaged_at',
        'shipped_at',
        'delivered_at',
    ];


    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_no', 'order_no');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getTotalPrice() {
        return $this->order_items->sum(function($order_items) {
          return $order_items->quantity * $order_items->price;
        });
    }
}
