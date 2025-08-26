<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'phone'];

    protected $hidden = ['password', 'remember_token'];
}
