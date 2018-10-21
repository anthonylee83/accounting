<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $table    = 'chart_of_accounts';
    protected $fillable = [
        'account_name',
        'account_type_id',
        'account_subtype_id',
        'account_normal_side_id',
        'account_balance'
    ];
    protected $appends = ['name'];

    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }

    public function accountSubtype()
    {
        return $this->belongsTo(AccountSubtype::class);
    }

    public function accountNormalSide()
    {
        return $this->belongsTo(AccountNormalSide::class);
    }

    public function getAccountBalanceAttribute($value)
    {
        return '$' . $value;
    }

    public function getNameAttribute()
    {
        return $this->account_name;
    }
}
