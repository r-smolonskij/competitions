<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        // static::created(function($user){
        //     $user->profile()->create([
        //     ]);
        // });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class)->orderBy('created_at', 'desc');
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}