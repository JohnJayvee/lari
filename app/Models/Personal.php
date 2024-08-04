<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Personal extends Authenticatable
{
    use Notifiable;

    protected $table = 'personal';

    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password',
        'beneficiary_name',
        'address',
        'primary_contact',
        'secondary_contact',
    ];

    protected $hidden = [
        'password',
    ];
}
