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
}
