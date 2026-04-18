<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'user_id',
        'target_distance',
        'target_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
