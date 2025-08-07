<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Illuminate\Validation\ValidationException; // Import ValidationException
use Illuminate\Http\RedirectResponse; // Import RedirectResponse
use Illuminate\Support\Facades\Auth; // Import Auth facade

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array<string, string>  $input
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(mixed $user, array $input): RedirectResponse
    {
        Validator::make($input, [
            'current_password' => ['required', 'string'], // Removed current_password:web as it might cause issues if not configured
            'password' => $this->passwordRules(),
        ], [
            'current_password.required' => __('The current password field is required.'),
            'password.required' => __('The new password field is required.'),
            'password.min' => __('The new password must be at least :min characters.'),
            'password.confirmed' => __('The new password confirmation does not match.'),
        ])->validateWithBag('updatePassword');

        // Manually check current password if 'current_password:web' rule is removed
        if (! Hash::check($input['current_password'], $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => [__('The provided current password does not match your actual password.')],
            ])->redirectTo(route('password.change.form')); // Redirect back to form on error
        }

        $user->forceFill([
            'password' => Hash::make($input['password']),
            'must_change_password' => false, // Reset the flag after successful password update
        ])->save();

        // ✅ Re-login the user to refresh the session and user object
        Auth::login($user);

        // Redirect to the courses index page with a success message
        return redirect()->route('courses.index')->with('success', 'Your password has been changed successfully! You now have access to the courses.');
    }
}
