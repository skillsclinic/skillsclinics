<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN = 'admin';
    const STA = 'sta';
    const SENIOR_MENTOR = 'seniorMentor';
    const JUNIOR_MENTOR = 'juniorMentor';
    const STREAM = 'stream';
    const STUDENT = 'student';

    const NEW = 'new';
    const OLD = 'old';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'id_number', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function tutees()
    {
        return $this->hasMany(Tutee::class, 'student_id');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'mentor_id');
    }

}
