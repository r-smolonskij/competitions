<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'user_id','description', 'title', 'image', 'url', 'type', 'contact', 'competition_start', 'competition_end', 'competition_start_UTC', 'competition_end_UTC', 'time_zone'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sportType()
    {
        return $this->hasOne(SportType::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
