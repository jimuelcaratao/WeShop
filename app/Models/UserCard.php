<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCard extends Model
{
    use HasFactory;


    protected $table = 'user_cards';
    protected $primaryKey = 'user_card_id';

    protected $fillable = [
        'user_id',
        'cardname',
        'cardnumber',
        'expmonth',
        'expyear',
        'ccv',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
