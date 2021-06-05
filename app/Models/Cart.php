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
    protected static function boot()
    {
        // make sure to call the parent method
        parent::boot();

        static::addGlobalScope('checkCategory', function(\Illuminate\Database\Eloquent\Builder $builder) {
            // get the relationships that are to be eager loaded
            $eagers = $builder->getEagerLoads();

            // check if the "category" relationship is to be eager loaded.
            // if so, add in the "status" constraint.
            if (array_key_exists('category', $eagers)) {
                $builder->where('status', 'published');
            }
        });
    }
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

    public function scopeWithStock($query)
    {
        return $query->with('product');
    }
}
