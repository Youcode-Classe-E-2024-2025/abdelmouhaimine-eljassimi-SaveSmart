<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Family;
use App\Models\SavingGoal;
use App\Models\TotalBalance;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function dashboard(){
        $transaction = Transaction::where('family_id', session('family')->id)->latest()->first();
        $transactions = Transaction::with(['family', 'user', 'category'])->where('user_id', session('user')->id)->paginate(5);
        $totalBalance = SavingGoal::where('user_id', session('user')->id)->latest()->get();
        $categories = Category::where('user_id', session('user')->id)->get();
        if($transactions === null){
            return view('welcome', compact( 'totalBalance', 'categories', 'transaction'));
        }
        return view('welcome', compact( 'totalBalance', 'categories', 'transaction', 'transactions'));
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            auth()->login($user);
            session(['user' => $user]);
            return redirect('/family');
        }
        return redirect('/login?error=Email or password is incorrect');
    }

    public function logout(){
        session()->forget('user');
        return redirect('/login');
    }
}
