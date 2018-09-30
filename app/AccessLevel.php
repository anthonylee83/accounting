<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    public const STANDARD = 1;
    public const MANAGER = 2;
    public const ADMIN = 3;

    protected $fillable = ['level'];

    /**
     * Users relation for access levels
     *
     * @return App\User collection of users
     */
    public function users()
    {
        return $this->hasManyThrough("App\User", "App\Profile");
    }

    /**
     * Profile relation from access levels
     *
     * @return App\Profile collection of profiles
     */
    public function profiles()
    {
        return $this->hasMany('App\Profile');
    }
}
