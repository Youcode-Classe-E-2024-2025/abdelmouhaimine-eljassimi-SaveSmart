<?php

namespace App\Http\Controllers;

use App\Models\SavingGoal;
use App\Models\TotalBalance;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Family;
use App\Models\User;

class SavingGoalController extends Controller
{

    public function index(){
        $budget = TotalBalance::where('family_id', session('family')->id)->latest()->first();
        $goals = SavingGoal::with(['family'])->where('family_id', session('family')->id)->get();
        return view('Goals', compact('goals', 'budget'));
    }
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
            'family_id' => session('user')->id
        ]);

        return redirect('/')->with('success', 'Saving goal added successfully!');
    }
    public function SavingPersonalGoal(Request $request)
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
            'family_id' => session('family')->id
        ]);

        return redirect('/goal')->with('success', 'Saving goal added successfully!');
    }

    public function EditSavingGoal(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target_amount' => 'required|numeric|min:1',
            'current_amount' => 'nullable|numeric|min:0',
            'target_date' => 'required|date',
            'is_completed' => 'nullable|boolean',
            'goal_id' => 'required|exists:saving_goals,id',
        ]);

        $goal = SavingGoal::find($request->goal_id);

        if ($goal) {
            $goal->name = $request->name;
            $goal->description = $request->description;
            $goal->target_amount = $request->target_amount;
            $goal->current_amount = $request->current_amount;
            $goal->target_date = $request->target_date;
            $goal->is_completed = $request->is_completed ? 1 : 0;
            $goal->save();
            return redirect('/goal')->with('success', 'Goal Updated Successfully!');
        }
        return redirect('/goal')->with('error', 'Goal Not Found!');
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
    public function delete($goal_id)
    {
        $goal = SavingGoal::find($goal_id);

        if ($goal) {
            $goal->delete();
            return redirect('/goal')->with('success', 'Objectif supprimé avec succès');
        }

        return redirect('/goal')->with('error', 'Objectif non trouvé');
    }




}
