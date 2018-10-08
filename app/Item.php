<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'name',
        'location',
        'type'
    ];

    public function equipment(){
        return $this->hasOne(Equipment::class);
    }

    public function inventory() {
        return $this->hasOne(Inventory::class);
    }
}
