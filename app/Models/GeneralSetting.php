<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'email',
        'address',
        'phone',
        'second_phone',
        'facebook',
        'youtube',
        'twitter',
        'instagram',
        'whatsapp',
        'google_map'
    ];
}
