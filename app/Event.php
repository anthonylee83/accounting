<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event_log';

    protected function eventType()
    {
        return $this->belongTo(EventType::class);
    }
}
