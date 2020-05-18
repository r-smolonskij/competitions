<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SportType extends Model
{
    protected $guarded = [];
    public function setNameAttribute($name)
    {
        $this->attributes['slug'] = Str::slug($name);
        $this->attributes['name'] = $name;
    }
    public function competitions()
    {
        return $this->belongsTo(Competition::class);
    }
}
