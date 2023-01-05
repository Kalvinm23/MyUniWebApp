<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierOrder extends Model
{
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function products(){
        return $this->hasMany(SupplierOrderDetails::class);
    }
}
