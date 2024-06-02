<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $table = 'ads';
    protected $fillable = [
        'content',
        'image',
        'metadata',
        'start_at',
        'end_at',
        'customer',
        'customer_contact',
        'views',
        'clicks',
    ];
}
