<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';
    protected $primaryKey = 'user_address_id';

    protected $fillable = [
        'user_id',
        'mobile_no',
        'house',
        'city',
        'province',
        'barangay',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
