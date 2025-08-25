<?php

namespace App\Http\Controllers\Frontend\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $breadcrumbs = [
            ['title' => 'Account', 'url' => route('customer.dashboard')],
            ['title' => 'Register', 'url' => '#']
        ];
        return view('frontend.customer.auth.register', compact('breadcrumbs'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|confirmed|min:6',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->route('customer.dashboard');
    }
}
