<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PasswordChangeController extends Controller
{
    /**
     * Handle the password update request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        // IMPORTANT: Ensure no dd() or die() calls are present above or within this method.
        // They would prevent the subsequent code (logout, redirect) from executing.

        // Log the start of the password change attempt
        Log::info('Password change attempt initiated for user ID: ' . (Auth::id() ?? 'Guest'));

        // 1. Validate the input
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => __('The current password field is required.'),
            'password.required' => __('The new password field is required.'),
            'password.min' => __('The new password must be at least :min characters.'),
            'password.confirmed' => __('The new password confirmation does not match.'),
        ]);

        if ($validator->fails()) {
            Log::warning('Password change validation failed for user ID: ' . (Auth::id() ?? 'Guest') . '. Errors: ' . json_encode($validator->errors()));
            // If validation fails, it redirects back with errors and input.
            // This is a common reason to remain on the same page.
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        // Check if the user is authenticated; this should ideally not be null here
        if (!$user) {
            Log::error('Password change attempt for unauthenticated user.');
            return redirect()->route('login')->with('error', 'You must be logged in to change your password.');
        }

        // 2. Check if the current password is correct
        if (! Hash::check($request->current_password, $user->password)) {
            Log::warning('Password change failed for user ' . $user->id . ': Incorrect current password provided.');
            // This will throw an exception if the current password is wrong,
            // which Laravel's default exception handler will convert to a redirect back with errors.
            throw ValidationException::withMessages([
                'current_password' => [__('The provided current password does not match your actual password.')],
            ]);
        }

        // 3. Update the password and reset the flag
        $user->forceFill([
            'password' => Hash::make($request->password),
            'must_change_password' => false, // Set this to false after successful change
        ])->save();

        // 4. IMPORTANT: Log the user OUT after password change.
        // This is crucial for security and to force re-authentication with the new password.
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Log successful password change
        Log::info('Password successfully changed for user ID: ' . $user->id . '. User logged out and redirected to login page.');

        // 5. Redirect the user to the LOGIN page
        return redirect()->route('login')->with('status', 'Your password has been changed successfully. Please log in with your new password.');
    }

    /**
     * Show the password change form.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showChangePasswordForm()
    {
        if (Auth::check() && Auth::user()->must_change_password) {
            return view('auth.passwords.change');
        }

        if (Auth::check()) {
            return redirect()->route('home')->with('info', 'You do not need to change your password at this time.');
        }

        return redirect()->route('login')->with('error', 'Please log in to change your password.');
    }
}
