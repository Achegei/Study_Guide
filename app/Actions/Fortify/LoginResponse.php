<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Responses\LoginResponse as FortifyLoginResponse; // Use Fortify's default response

class LoginResponse extends FortifyLoginResponse
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    // ✅ The method signature below is corrected to be compatible with the interface.
    public function toResponse($request): Response
    {
        // Check if the logged-in user needs to change their password
        if (Auth::check() && Auth::user()->must_change_password) {
            // If the flag is true, redirect them to the password change form
            // and include a warning message.
            return redirect()->route('password.change.form')->with('warning', 'You must change your password to continue.');
        }

        // If no password change is needed, proceed with Fortify's default redirect.
        return parent::toResponse($request);
    }
}
