<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Ratio extends Model
{
    protected $table = 'ratio';
	protected $fillable = ['ratio_title', 'value'];
	public $timestamps = false;
}
