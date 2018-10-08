<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    //
    protected $fillable = [
        'date',
        'inventory_id',
        'quantity'
    ];

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
}
