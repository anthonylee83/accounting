<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JournalEntry;

class Attachment extends Model
{
    protected $fillable = ['journal_entry_id', 'file'];

    public function journalEntry()
    {
        return $this->belongsTo(JournalEntry::class);
    }
}
