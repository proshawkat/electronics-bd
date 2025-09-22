<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'phone'];

    protected $hidden = ['password', 'remember_token'];

    public function sendPasswordResetNotification($token)
    {
        $url = route('customer.password.reset', [
            'token' => $token,
            'email' => $this->email,
        ]);

        $this->notify(new \App\Notifications\ResetPassword($url));
    }
}
