<?php

namespace App\Http\Controllers;

use App\Models\SavingGoal;
use Illuminate\Http\Request;

class SavingGoalController extends Controller
{
    public function SavingGoal(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target_amount' => 'required|numeric|min:1',
            'current_amount' => 'nullable|numeric|min:0',
            'target_date' => 'required|date',
            'is_completed' => 'nullable|boolean',
            'family_id' => 'required|exists:families,id',
        ]);

        SavingGoal::create([
            'name' => $request->name,
            'description' => $request->description,
            'target_amount' => $request->target_amount,
            'current_amount' => $request->current_amount ?? 0,
            'target_date' => $request->target_date,
            'is_completed' => $request->is_completed ?? false,
            'family_id' => $request->family_id,
        ]);

        return redirect('/')->with('success', 'Saving goal added successfully!');
    }


    public function addMoney(Request $request)
    {
        $Saving_Goal = SavingGoal::where('family_id', $request->id)->first();
        if ($Saving_Goal) {
            $Saving_Goal->update([
                'current_amount' => $Saving_Goal->current_amount + $request->amount,
            ]);
        }
        return redirect('/');
    }

}
