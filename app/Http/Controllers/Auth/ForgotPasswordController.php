<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    public function create()
    {
        return view('auth.passwords.email');
    }

    public function store(Request $request)
    {   $request->validate([
        'email'=>['required','email',]
    ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status == Password::RESET_LINK_SENT
                        ? back()->with('status',__($status))
                        : back()->withInput($request->only('email'))
                                ->withErrors(['email'=>__($status)]);
    }
}
