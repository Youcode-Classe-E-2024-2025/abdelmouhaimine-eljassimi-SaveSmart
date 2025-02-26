<?php

namespace App\Http\Controllers;

use App\Models\SavingGoal;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Category;

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
        $Saving_Goal = SavingGoal::where('family_id', session('user')->id)->first();
        $category = Category::find($request->category_id);

        if ($Saving_Goal && $category) {
            $amount = $request->amount;
            $type = $category->type;

            if ($type == 'expense') {
                $Saving_Goal->update([
                    'current_amount' => $Saving_Goal->current_amount - $amount,
                ]);
            } else {
                $Saving_Goal->update([
                    'current_amount' => $Saving_Goal->current_amount + $amount,
                ]);
            }

            Transaction::create([
                "description" => $category->name,
                "amount" => $amount,
                "date" => date('Y-m-d'),
                "type" => $type,
                "category_id" => $category->id,
                "user_id" => session('user')->id,
                "family_id" => session('family')->id
            ]);

            return redirect('/');
        }

        return redirect('/')->with('error', 'Saving Goal or Category not found');
    }


}
