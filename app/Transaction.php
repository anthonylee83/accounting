<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['account_id', 'credit', 'journal_entry_id', 'debit', 'amount', 'description'];
}
