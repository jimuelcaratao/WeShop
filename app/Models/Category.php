<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';


    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'category_id');
    }
}
