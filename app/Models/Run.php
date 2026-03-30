<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'distance',
        'pace',
    ];

    protected static function booted()
    {
        static::saving(function ($run) {
            if($run->distance > 0){
                $run->pace = $run->duration / $run->distance;
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
