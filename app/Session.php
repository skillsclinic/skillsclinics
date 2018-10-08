<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
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
