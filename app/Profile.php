<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model 
{
    //
    protected $guarded = [];

    protected $fillable = [
        'user_id','description', 'url', 'image', 'gender', 'birthday'
    ];

    public function profileImage()
    {
        //{{ URL::asset('./images/results/first-place.svg')}}

        
        return ($this->image) ? '/storage/' . $this->image : '/images/avatars/avatar.png' ;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
