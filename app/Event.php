<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'competition_id','description', 'result_type', 'event', 'unit_of_measurment', 
    ];

    public function competition()
    {
        return $this->hasOne(Competition::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
    

}
