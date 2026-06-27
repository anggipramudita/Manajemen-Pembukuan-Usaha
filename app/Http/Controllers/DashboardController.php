<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Cash;

class DashboardController extends Controller
{
    public function index()
    {
        // $totalIncome = Income::whereMonth('date', date('m'))->sum('nominal');
        // $totalExpense = Expense::whereMonth('date', date('m'))->sum('nominal');
        // $netProfit = $totalIncome - $totalExpense;
        // return view('dashboard.index', compact('totalIncome', 'totalExpense', 'netProfit'));
        return view('dashboard.index');
    }
}
