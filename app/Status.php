<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JournalEntry;

class Status extends Model
{
    protected $table    = 'status';
    protected $fillable = ['state'];

    public function journalEntries()
    {
        return $this->hasMany(JournalEntry::class);
    }
}
