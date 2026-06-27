<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    protected $guarded = [];
    public function bank() { return $this->belongsTo(Bank::class); }
}
