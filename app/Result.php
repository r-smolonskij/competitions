<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
         'event_id', 'time_result', 'number_result', 'proof_url', 'user_id', 'user_gender'
    ];
    public function event()
    {
        return $this->hasOne(Event::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // public function user()
    // {
    //     return $this->hasOne(User::class);
    // }

}
