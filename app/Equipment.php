<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    //
    protected $fillable = [
        'item_id',
        'property_number'
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
