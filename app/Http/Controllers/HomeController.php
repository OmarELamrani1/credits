<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\MonthlyPayement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $monthlyPayements = MonthlyPayement::get();
        $credit = Credit::first();
        $creditMonth = MonthlyPayement::whereMonth('created_at', Carbon::now()->format('m'))->get();
        return view('dashboard', compact(['monthlyPayements','credit','creditMonth']));
    }
}
