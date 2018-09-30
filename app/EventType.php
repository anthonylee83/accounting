<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected function events()
    {
        return $this->hasMany(Event::class);
    }
}
