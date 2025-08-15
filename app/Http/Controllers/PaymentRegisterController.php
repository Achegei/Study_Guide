<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Google\Client;
use Google\Service\Sheets;
use Carbon\Carbon; // Import Carbon for date manipulation

class PaymentRegisterController extends Controller
{
    /**
     * Show the custom payment registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $courseOptions = [
            'Canadian Citizenship Test Preparation' => 'Canadian Citizenship Test Preparation',
            'Driving Test Preparation' => 'Driving Test Preparation', // Add driving option for selection
            'Both Citizenship and Driving Tests' => 'Both Citizenship and Driving Tests', // Option for both
        ];
        return view('auth.register-payment', compact('courseOptions'));
    }

    /**
     * Handle a custom payment registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // 1. Validate incoming request data
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'course_selected' => ['required', 'string', 'in:Canadian Citizenship Test Preparation,Driving Test Preparation,Both Citizenship and Driving Tests'],
            'amount_sent' => ['required', 'numeric', 'min:0.01'],
            'interac_reference' => ['required', 'string', 'max:255'],
            'payment_screenshot' => ['nullable', 'image', 'max:2048'],
            'payment_confirmation' => ['accepted'],
            'registration_type' => ['required', 'string', 'in:citizenship,driving,both'],
        ], [
            'payment_confirmation.accepted' => 'You must confirm that you have sent the payment.',
        ]);

        $commonPassword = 'password';
        $defaultRoleId = 2; // Default role for new users (e.g., 'regular user')

        $screenshotPath = null;
        if ($request->hasFile('payment_screenshot')) {
            $screenshotPath = $request->file('payment_screenshot')->store('payments', 'public');
        }

        // 2. Create the user in Laravel backend
        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($commonPassword),
            'role_id' => $defaultRoleId,
            'must_change_password' => true,
            'user_type' => $request->registration_type,
            'email_verified_at' => now(),
            'access_expires_at' => Carbon::now()->addYear(), // Set expiration date to one year from now
        ]);

        // ✅ GOOGLE SHEETS API INTEGRATION START
        try {
            $client = new Client();
            $client->setAuthConfig(storage_path('app/google/google-service-account-key.json'));
            $client->setScopes([Sheets::SPREADSHEETS]);

            $service = new Sheets($client);

            $spreadsheetId = '1ZQr2ZO-pdb_Ric3s0Rx6acz6_6-1sU6CqxSmtyFAbYU';
            $range = 'Form Responses 1!A:Z';

            // Prepare the values to be appended as a new row, including the expiration date
            $values = [
                [
                    now()->toDateTimeString(),
                    $request->full_name,
                    $request->email,
                    $request->phone_number,
                    $request->course_selected,
                    $request->amount_sent,
                    $request->interac_reference,
                    $screenshotPath ? asset('storage/' . $screenshotPath) : 'N/A',
                    $request->payment_confirmation ? 'Confirmed' : 'Not Confirmed',
                    $request->registration_type,
                    // Fixed: Use null-safe operator or ternary to handle potential null access_expires_at
                    $user->access_expires_at ? $user->access_expires_at->toDateTimeString() : 'N/A', // <-- Changed this line
                ]
            ];

            $body = new Sheets\ValueRange([
                'values' => $values
            ]);

            $params = [
                'valueInputOption' => 'RAW'
            ];

            $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

            Log::info('Data successfully appended to Google Sheet for user: ' . $user->email);
            Log::info('Google Sheets API response: ' . json_encode($result->toSimpleObject()));

        } catch (\Google\Exception $e) {
            Log::error('Google Sheets API error for user: ' . $user->email . ' - ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('General error during Google Sheets API call for user: ' . $user->email . ' - ' . $e->getMessage());
        }
        // ✅ GOOGLE SHEETS API INTEGRATION END

        // 4. Log the user in
        Auth::login($user);

        // 5. Redirect the user to the password change form as per your existing flow.
        return redirect()->route('password.change.form')->with('success', 'Registration and payment details submitted! Please change your password to continue.');
    }
}
