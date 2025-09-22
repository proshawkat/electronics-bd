<?php

namespace App\Http\Controllers\Frontend\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('frontend.customer.auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:customers,email']);

        $status = Password::broker('customers')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'We have emailed your password reset link!')
            : back()->withErrors(['email' => 'Unable to send reset link.']);
    }

    public function showResetForm($token)
    {
        return view('frontend.customer.auth.reset-password', compact('token'));
    }

    public function resetPass(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::broker('customers')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('customer.login')->with('success', 'Password has been reset successfully.')
            : back()->withErrors(['email' => 'Invalid token or email.']);
    }
}
