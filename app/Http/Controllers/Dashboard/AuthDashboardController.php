<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthDashboardController extends Controller
{
//    use AuthenticatesUsers;
   public function login() {
       return view("auth.login");
   }
   public function loginProcess(Request $request) {
       $user =  $request->validate([
           'email' => 'required|email|exists:users,email',
           'password' => 'required'
       ]);
       $credentials = $request->only(['email', 'password']);
       $explorer =  Auth::guard("web")->attempt($credentials);

       if($explorer) {
           return redirect()->intended('dashboard/index');
       }
       return back();
   }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('dashboard/login');
    }
}
