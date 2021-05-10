<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $table="gul";

    public $timestamps=false;

    protected $fillable =
    [
        'name', 'last_name', 'password', 'api_token',
    ];
}
