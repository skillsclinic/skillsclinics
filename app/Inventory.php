<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable = [
        'item_id',
        'quantity',
        'status'
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
