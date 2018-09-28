<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'tutee_id',
        'mentor_id',
        'session_no',
        'date',
        'time_in',
        'time_out',
        'areaOfConcern',
        'pre_test',
        'post_test',
        'remarks'
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class);
    }
}
