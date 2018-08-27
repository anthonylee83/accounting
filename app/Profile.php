<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * Access level of profile
     *
     * @return App\AccessLevel
     */
    public function accessLevel()
    {
        return $this->belongsTo('App\AccessLevel');
    }

    /**
     * User relation on a profile
     *
     * @return App]\User //user model of profile
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
