<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierOrderDetails extends Model
{
    public function supplierorder(){
        return $this->belongsTo(SupplierOrder::class);
    }
}
