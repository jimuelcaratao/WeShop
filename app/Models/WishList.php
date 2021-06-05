<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    
    protected $table = 'wish_lists';
    protected $primaryKey = 'wish_list_id';

    protected $fillable = [
        'user_id',
        'product_code',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_code', 'product_code');
    }
}
