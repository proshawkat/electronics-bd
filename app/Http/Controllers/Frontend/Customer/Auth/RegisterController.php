<?php

namespace App\Http\Controllers\Frontend\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;

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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => ['required', 'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/', 'unique:customers,phone'],
            'email' => 'required|email|unique:customers',
            'password' => 'required|confirmed|min:6',
        ]);

        $customer = Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        if ($request->filled('newsletter') && $request->newsletter) {
            Newsletter::create([
                'email'       => $customer->email,
                'customer_id' => $customer->id,
            ]);
        }

        Auth::guard('customer')->login($customer);

        return redirect()->route('customer.dashboard');
    }
}
