<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Route;
use App\Models\Tag;

class Run extends Model
{
    protected $fillable = [
        'user_id',
        'route_id',
        'date',
        'distance',
        'duration',
        'pace',
        'image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    protected static function booted()
    {
        static::saving(function ($run) {
            if($run->distance > 0){
                $run->pace = $run->duration / $run->distance;
            }
        });
    }
}
