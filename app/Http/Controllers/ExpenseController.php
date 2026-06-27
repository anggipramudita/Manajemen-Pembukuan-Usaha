<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index() { return view('transactions.expense.index'); }
    public function create() { return view('transactions.expense.create'); }
    public function store(Request $request) {}
    public function edit(Expense $expense) { return view('transactions.expense.edit'); }
    public function update(Request $request, Expense $expense) {}
    public function destroy(Expense $expense) {}
}
