<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debt;

class DebtController extends Controller
{
    public function index() { return view('transactions.debt.index'); }
}
