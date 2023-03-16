<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];

    public function categories(){
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    public function images(){
        return $this->belongsToMany('App\Models\Image')->withTimestamps();
    }
}
