<?php

namespace App\Http\Controllers\Frontend\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        $breadcrumbs = [
            ['title' => 'Account', 'url' => route('customer.dashboard')],
            ['title' => 'login', 'url' => '#']
        ];
        return view('frontend.customer.auth.login', compact('breadcrumbs'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended(route('customer.dashboard'));
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }
}
