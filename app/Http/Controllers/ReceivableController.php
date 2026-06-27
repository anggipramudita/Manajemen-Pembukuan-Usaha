<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receivable;

class ReceivableController extends Controller
{
    public function index() { return view('transactions.receivable.index'); }
}
