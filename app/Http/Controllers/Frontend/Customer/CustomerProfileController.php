<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class CustomerProfileController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('frontend.customer.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $customer = auth('customer')->user();

        // Check current password
        if (!Hash::check($request->current_password, $customer->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update new password
        $customer->password = Hash::make($request->password);
        $customer->save();

        return redirect()->route('customer.dashboard')->with('success', 'Password changed successfully.');
    }
}
