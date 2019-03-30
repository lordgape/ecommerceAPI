<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "name","details","stock","discount","price"
    ] ;

    public function reviews()
    {
       return $this->hasMany(Review::class);
    }
}
