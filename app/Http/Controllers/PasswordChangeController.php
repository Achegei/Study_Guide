<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Don't forget to import the Log facade!

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
         dd('Controller Hit!');
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
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        // 2. Check if the current password is correct
        if (! Hash::check($request->current_password, $user->password)) {
            Log::warning('Password change failed for user ' . $user->id . ': Incorrect current password provided.');
            throw ValidationException::withMessages([
                'current_password' => [__('The provided current password does not match your actual password.')],
            ]);
        }

        // 3. Update the password and reset the flag
        $user->forceFill([
            'password' => Hash::make($request->password),
            'must_change_password' => false, // Set this to false after successful change
        ])->save();

        // 4. Re-login the user to refresh the session and potentially update 'last_activity' etc.
        Auth::login($user);

        // Log successful password change
        Log::info('Password successfully changed for user ID: ' . $user->id . '. Redirecting to courses.index.');

        // 5. Forcefully redirect the user to a new page
        return redirect()->route('courses.index')->with('status', 'Your password has been changed successfully.');
    }
}
