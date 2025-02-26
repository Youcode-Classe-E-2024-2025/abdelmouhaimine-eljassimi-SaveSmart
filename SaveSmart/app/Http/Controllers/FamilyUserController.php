<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FamilyUserController extends Controller
{
    public function join(Request $request)
    {
        $validated = $request->validate([
            'family_id' => 'required|exists:families,id',
            'password' => 'required|string',
        ]);

        $family = Family::findOrFail($validated['family_id']);


        if (!Hash::check($validated['password'], $family->password)) {
            return back()->withErrors(['password' => 'Mot de passe incorrect']);
        }

        if (auth()->user()->families->contains($family->id)) {
            return back()->withErrors(['family_id' => 'Vous êtes déjà membre de cette famille']);
        }

        auth()->user()->families()->attach($family->id);

        return redirect()->route('families.show', $family->id)
            ->with('success', 'Vous avez rejoint la famille avec succès!');
    }

}
