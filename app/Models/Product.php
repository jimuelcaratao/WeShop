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
        // 'product_price_id',
        'product_name',
        'description',
        'specs',
        'stock',
        'price',
    ];

    public function product_photos()
    {
        return $this->hasOne(ProductPhoto::class, 'product_code', 'product_code');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'brand_id', 'brand_id');
    }

    public function product_price()
    {
        return $this->hasOne(ProductPrice::class, 'product_code', 'product_code');
    }


    public function product_reviews()
    {
        return $this->hasMany(Review::class, 'product_code', 'product_code')->latest();
    }

    // filtering product
    public function scopeProductFilter($q)
    {
        if (!empty(request()->advanceSearch)) {

            $q->Where('sku', 'LIKE', '%' . request()->advanceSearch .  '%')
                ->OrWhere('product_code', 'LIKE', '%' . request()->advanceSearch .  '%')
                ->OrWhere('product_name', 'LIKE', '%' . request()->advanceSearch .  '%');
        }

        return $q;
    }

    public function scopeCategoryFilter($q)
    {
        if (!empty(request()->searchCategory)) {
            $categories_searchConvert = Category::where('category_id', request()->searchCategory)->first();

            $categories_search = $categories_searchConvert->category_name;

            $q->Where('category_name', 'LIKE', '%' .  $categories_search  .  '%');
        }

        return $q;
    }

    public function scopeSubCategoryFilter($q)
    {
        if (!empty(request()->searchSubCategory)) {
            $q->Where('sub_category_name', 'LIKE', '%' .  request()->searchSubCategory  .  '%');
        }

        return $q;
    }

    public function scopeBrandFilter($q)
    {
        if (!empty(request()->searchBrand)) {
            $q->Where('brand_id', 'LIKE', '%' . request()->searchBrand .  '%');
        }

        return $q;
    }

    public function scopeBrandTypeFilter($q)
    {
        if (!empty(request()->brand_type)) {
            $q->Where('brand_id', request()->brand_type);
        }

        return $q;
    }

    public function scopeStockFilter($q)
    {
        if (!empty(request()->stock_type)) {
            if (request()->stock_type == 'in') {
                $q->Where('stock', '>', 0);
            }

            if (request()->stock_type == 'out') {
                $q->Where('stock', '<=', 0);
            }
        }

        return $q;
    }
}
