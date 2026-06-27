<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded = [];
    public function category() { return $this->belongsTo(IncomeCategory::class, 'category_id'); }
    public function user() { return $this->belongsTo(User::class); }
}
