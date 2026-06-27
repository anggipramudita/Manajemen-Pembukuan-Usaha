<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cash;

class CashController extends Controller
{
    public function index() { return view('transactions.cash.index'); }
}
