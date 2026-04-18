<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'name',
        'distance',
        'description'
    ];

    public function runs()
    {
        return $this->hasMany(Run::class);
    }
}
