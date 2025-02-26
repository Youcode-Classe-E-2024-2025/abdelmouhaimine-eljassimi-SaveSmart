<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TotalBalance;
use App\Models\Family;
use App\Http\Controllers\Controller;

class TotalBalanceController extends Controller
{
    public function addMoney(Request $request)
    {
        $totalBalance = TotalBalance::where('family_id', $request->id)->first();

        if ($totalBalance) {
            $totalBalance->update([
                'balance' => $totalBalance->balance + $request->amount,
            ]);
        } else {
            TotalBalance::create([
                'balance' => $request->amount,
                'family_id' => $request->id
            ]);
        }
        return redirect('/');
    }
}
