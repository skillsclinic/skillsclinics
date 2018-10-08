<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    //
    protected $fillable = [
        'date',
        'inventory_id',
        'quantity',
        'remarks'
    ];

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
}
