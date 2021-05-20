<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $table = 'visits';
    protected $primaryKey = 'visit_id';

    public $timestamps = false;

    protected $fillable = [
        'ip_address',
        'visit_date',
    ];
}
