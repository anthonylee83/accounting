<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LoginActivity extends Model
{
    protected $fillable = ['email', 'type'];
}
