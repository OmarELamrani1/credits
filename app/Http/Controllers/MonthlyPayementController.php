<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonthlyPayementRequest;
use App\Models\Credit;
use App\Models\MonthlyPayement;
use Illuminate\Http\Request;

class MonthlyPayementController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(MonthlyPayementRequest $request)
    {
       $monthlyPaye = MonthlyPayement::create($request->validated());
    //    $credit =  Credit::findOrFail(1);
    //    $credit->update([
    //        'amountRemained' =>$credit->amountRemained - $monthlyPaye
    //     ]);
        return redirect()->back();
    }

    public function show(MonthlyPayement $monthlyPayement)
    {
        //
    }

    public function edit(MonthlyPayement $monthlyPayement)
    {
        //
    }

    public function update(Request $request, MonthlyPayement $monthlyPayement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthlyPayement  $monthlyPayement
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyPayement $monthlyPayement)
    {
        //
    }
}
