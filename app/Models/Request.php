<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'chat_id'
    ];

    public function user() {
        return $this->belongsTo(UserBot::class, 'user_id', 'id');
    }
}
