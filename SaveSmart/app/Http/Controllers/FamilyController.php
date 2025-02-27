<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FamilyController extends Controller
{
    /**
     * Display a listing of all families.
     */
    public function index()
    {
        $userId = session('user')->id;
        $families = Family::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        return view('family', compact('families'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $family = Family::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        Auth::user()->families()->attach($family->id);
        return redirect('/family')->with('success', 'Family created successfully and you have been added as a member.');
    }

    public function validateprofile(Request $request)
    {
        $family = Family::where('id', $request->id)->first();
        if ($family && Hash::check($request->password, $family->password)) {
            Session::put('family', $family);
            return redirect('/');
        }else{
            return redirect('/family?error password invalide !');
        }
    }

}



