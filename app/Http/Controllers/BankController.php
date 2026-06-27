<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function index() { return view('transactions.bank.index'); }
}
