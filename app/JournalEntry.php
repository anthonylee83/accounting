<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    protected $fillable = ['approved', 'created_user_id', 'document_reference_id', 'reference', 'approval_user_id'];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function approvalUser()
    {
        return $this->belongsTo('App\User', 'approval_user_id');
    }
}
