<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;

class IncomeController extends Controller
{
    public function index() { return view('transactions.income.index'); }
    public function create() { return view('transactions.income.create'); }
    public function store(Request $request) {}
    public function edit(Income $income) { return view('transactions.income.edit'); }
    public function update(Request $request, Income $income) {}
    public function destroy(Income $income) {}
}
