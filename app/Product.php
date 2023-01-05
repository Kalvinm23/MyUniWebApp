<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }
}
