<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JournalEntry;

class Attachment extends Model
{
    protected $fillable = ['journal_entry_id', 'file', 'filename'];

    public function journalEntry()
    {
        return $this->belongsTo(JournalEntry::class);
    }
}
