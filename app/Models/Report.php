<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'reported_id',
        'reported_by',
        'reason'
    ];

    public function reported()
    {
        return $this->belongsTo(UserBot::class, 'reported_id', 'id');
    }

    public function reportedby()
    {
        return $this->belongsTo(UserBot::class, 'reported_by', 'id');
    }
}
