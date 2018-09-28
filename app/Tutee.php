<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutee extends Model
{
    //

    protected $fillable = [
        'student_id',
        'subject_id',
        'professor',
        'month',
        'schoolYear'
    ];


    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
