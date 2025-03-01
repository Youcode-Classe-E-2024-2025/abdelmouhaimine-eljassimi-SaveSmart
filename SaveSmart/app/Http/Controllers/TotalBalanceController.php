<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TotalBalance;
use App\Models\Family;
use App\Http\Controllers\Controller;

class TotalBalanceController extends Controller
{

    public function AddBudget(Request $request){
        $request->validate(["Budget"=>"required|numeric"]
        );
        TotalBalance::create(["family_id"=>session('family')->id,"balance"=>$request->Budget]);
        return redirect('/goal');
    }

    public function Optimization(Request $request)
    {
        $request->validate([
           "budget" => "required|numeric"
        ]);

        $budget = $request->budget;

        $needsPercentage = 0.50;
        $wantsPercentage = 0.30;
        $savingsPercentage = 0.20;

        $needs = $budget * $needsPercentage;
        $wants = $budget * $wantsPercentage;
        $savings = $budget * $savingsPercentage;

        session([
            'optimizationResult' => [
                'besoins' => $needs,
                'envies' => $wants,
                'epargne' => $savings,
            ],
        ]);
        return redirect('/goal');
    }
}
