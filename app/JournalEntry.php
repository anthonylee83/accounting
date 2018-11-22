<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Attachment;
use App\Status;

class JournalEntry extends Model
{
    protected $fillable = ['status_id', 'created_user_id', 'document_reference_id', 'reference', 'approval_user_id', 'description', 'comments'];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function approvalUser()
    {
        return $this->belongsTo('App\User', 'approval_user_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
