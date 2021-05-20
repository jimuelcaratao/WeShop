<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Review extends Model
{
    use HasFactory,Commentable;

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
