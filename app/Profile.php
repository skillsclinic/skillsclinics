<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    const MALE = 'male';
    const FEMALE = 'female';

    protected $fillable = [
        'user_id',
        'lastName',
        'firstName',
        'middleInitial',
        'birthday',
        'gender',
        'contact',
        'email'
    ];

}
