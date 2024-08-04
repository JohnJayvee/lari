<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = ('userstable');
    protected $primaryKey = ('UserID');
    protected $guard = ('web');


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* Get level */
    public static function getLevel(){
        return DB::table('userleveltable')
            ->select(
                'userleveltable.userlevelid',
                'userleveltable.userlevel',
                'userleveltable.uleveldescription',
                )
            ->first();
    }


    /* Get MainModules */
    public static function getMainModules(){
        return DB::table('moduletable')
            ->where('type','=','main')
            ->select(
                'moduletable.moduleid',
                'moduletable.modulename',
                'moduletable.url',
                'moduletable.icon',
                )
            ->orderBy('moduletable.order','ASC')
            ->get();
    }


    /* Get SubModules */
    public static function getSubModules(){
        return DB::table('moduletable')
            ->where('type','=','submenu')
            ->select(
                'moduletable.moduleid',
                'moduletable.modulename',
                'moduletable.url',
                )
            ->orderBy('moduletable.order','ASC')
            ->get();
    }

}
