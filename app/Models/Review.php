<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;

class Review extends Model
{
    use HasFactory, Commentable, SoftDeletes;

    protected $table = 'reviews';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'product_code',
        'stars',
        'body',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
